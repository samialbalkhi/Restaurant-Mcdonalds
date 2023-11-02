<?php
namespace App\Service\Frontend\DeliverySection;

use Exception;
use Omnipay\Omnipay;

use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\Accounting;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Frontend\OrderRequest;

class OrederService
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function store(OrderRequest $request)
    {
        $cart = Cart::subtotal();
        $order = Order::create([
            'total_amount' => $cart,
            'status' => false,
            'restaurant_branche_id' => $request->restaurant_branche_id,
        ]);

        $products = Cart::content();
        foreach ($products as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $product->qty,
                'price' => $product->price,
            ]);
        }

        Accounting::create([
            'street' => $request->street,
            'note' => $request->note,
            'house_number' => $request->house_number,
            'postal_code' => $request->postal_code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'order_id' => $order->id,
        ]);

        try {
            $response = $this->gateway
                ->purchase([
                    'amount' => $cart,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'), // Corrected from 'canceUrl' to 'cancelUrl'
                ])
                ->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);
            
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();
                Payment::create([
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                    'payment_status' => $arr['state'],
                ]);

                return 'success';
            } else {
                // Log the error message for debugging
                $errorMessage = $response->getMessage();
                // You can log the $errorMessage or use Laravel's logger to log it to a file or other storage.

                // Return a user-friendly message
                return 'Payment declined: ' . $errorMessage;
            }
        } else {
            return 'Payment declined';
        }
    }
}
