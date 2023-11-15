<?php
namespace App\Service\RestaurantOwner;

class ShowReviewService
{
    public function show()
    {
        $owner = auth('restaurantOwner')->user();

        $owner->load('restaurantBranche.restaurantReviews.user:id,name');
        $reviews = $owner->restaurantBranche->restaurantReviews;

        return $reviews;
    }
}
