<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddToCardService
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

    // Add the product to the cart
 $cart=   Cart::add([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'qty' => 1, // You can change this as needed
    ]);

    // Store the cart in the session
     Cart::store('cart');
     return $cart;
    }

    public function numberOfContent()
    {
        Cart::restore('cart');
        $itemCount = Cart::count();
        return $itemCount;
    }
}
