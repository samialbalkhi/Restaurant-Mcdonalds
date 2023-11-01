<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Frontend\OrderRequest;

class OrederService
{
    public function store(OrderRequest $request): Order
    {
        if (auth()->check()) {
            $userName = auth()->user()->name;
            dd($userName);
        } else {
            // Handle the case when there is no authenticated user
            dd('No authenticated user');
        }
        dd(auth()->user);
        $cart = Cart::subtotal();
        if (Auth::check()) 
            return Order::create([
                'total_amount' =>$cart,
                'status' => false,
                'restaurant_branche_id' => $request->restaurant_branche_id,
            ]);
        
        
        return response()->json(['message' => 'User is not logged in. Order not saved.'], 401);
    }
}
