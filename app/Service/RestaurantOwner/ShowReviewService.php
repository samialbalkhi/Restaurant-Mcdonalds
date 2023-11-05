<?php
namespace App\Service\RestaurantOwner;

class ShowReviewService
{
    public function show()
    {
        $owner = auth()->user();
        return $owner->restaurantBranche->restaurantReviews;
    }
}
