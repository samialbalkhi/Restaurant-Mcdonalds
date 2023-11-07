<?php
namespace App\Service\RestaurantOwner;

class ShowReviewService
{
    public function show()
    {
        $owner = auth()->user('restaurantowner');
        return $owner->restaurantBranche->restaurantReviews;
    }
}
