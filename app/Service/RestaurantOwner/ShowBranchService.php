<?php
namespace App\Service\RestaurantOwner;

use Illuminate\Support\Facades\Auth;

class ShowBranchService
{
    public function show()
    {
        // dd( $owner = auth('restaurantOwner')->user());
       
        $owner = auth('restaurantOwner')->user();
        $restaurantBranche = $owner
            ->restaurantBranche()
            ->with('city')
            ->first();

        return $restaurantBranche;
    }
}
