<?php
namespace App\Service\Frontend\DeliverySection;

use Exception;
use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Frontend\PaymentRequest;

class PaymentService
{
    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function payment()
    {
        $cart = Cart::subtotal();
        try {
            $response = $this->gateway
                ->purchase([
                    'amount' => $cart,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
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
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                    'payment_status' => $arr['state'],
                ]);
                return 'success';
            } else {
                $errorMessage = $response->getMessage();

                return 'Payment declined: ' . $errorMessage;
            }
        } else {
            return 'Payment declined';
        }
    }
    
    public function error()
    {
        return 'User declined the payment !!';
    }
}
