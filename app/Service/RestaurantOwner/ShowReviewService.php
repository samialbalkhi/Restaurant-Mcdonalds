<?php
namespace App\Service\RestaurantOwner;

class ShowReviewService
{
    public function show()
    {
        $owner = auth('restaurantOwner-api')->user();

        return $owner->restaurantBranche->restaurantReviews;
    }
}
