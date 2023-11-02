<?php
namespace App\Service\Frontend\DeliverySection;

use Exception;

use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\Accounting;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Frontend\OrderRequest;
use Omnipay\Omnipay;

class OrederService
{
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
    }
}
