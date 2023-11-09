<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Accounting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Frontend\OrderRequest;

class OrederService
{
    private function store(OrderRequest $request)
    {
        $cart = Cart::subtotal();
        $products = Cart::content();
        foreach ($products as $product) {
            $branshId = $product->options->restaurant_branche_id;
        }

        $order = Order::create([
            'total_amount' => $cart,
            'status' => false,
            'restaurant_branche_id' => $branshId,
        ]);

        session(['order_id' => $order->id]);
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
            'phone' => $request->phone,
            'order_id' => $order->id,
        ]);
    }
    public function check(OrderRequest $request)
    {
        if (Auth::check()) {
            $this->store($request);
            return response()->json(['message' => 'Order placed successfully.']);
        } else {
            return response()->json(['message' => 'Please log in or register to complete your order.'], 401);
        }
    }
}
