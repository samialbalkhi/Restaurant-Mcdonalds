<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCardService
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
        ]);

        return 'add successful';
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
}
