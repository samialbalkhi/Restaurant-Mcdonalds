<?php
namespace App\Service\RestaurantOwner;

class ShowBranchService
{
    public function show()
    {
        $owner = auth()->user();

        $restaurantBranche = $owner
            ->restaurantBranche()
            ->with('city')
            ->first();

        return $restaurantBranche;
    }
}
