<?php
namespace App\Service\RestaurantOwner;

class ShowBranchService
{
    public function show()
    {
        // dd('asd');
        dd(auth()->user());
        $owner = auth('restaurantowner')->user();
        $restaurantBranche = $owner
            ->restaurantBranche()
            ->with('city')
            ->first();

        return $restaurantBranche;
    }
}
