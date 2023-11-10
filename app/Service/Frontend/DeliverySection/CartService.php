<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        if ($request->quantity > 1) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $request->quantity,
                'options' => ['description' => $request->description, 'restaurant_branche_id' => $product->restaurant_branche_id],
            ]);
            return 'Add successful';
        } else {
            return 'Quantity must be greater than 1';
        }
    }

    public function numberOfProduct()
    {
        return Cart::content()->count();
    }

    public function show()
    {
        return Cart::content();
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        return 'delete';
    }
    public function subtotal()
    {
        return Cart::subtotal();
    }
}
