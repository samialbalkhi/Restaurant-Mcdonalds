<?php
namespace App\Service\RestaurantOwner;

class ShowReviewService
{
    public function show()
    {
        $owner = auth('restaurantowner')->user();
        return $owner->restaurantBranche->restaurantReviews;
    }
}
