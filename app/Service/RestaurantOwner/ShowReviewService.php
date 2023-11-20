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

    public function calculateReviewAverage()
    {
        $owner = auth('restaurantOwner')->user();

        $owner->load('restaurantBranche.restaurantReviews.user:id,name');
        $reviews = $owner->restaurantBranche->restaurantReviews;

        $averageRating = $reviews->avg('rating');

        return $averageRating;
    }
}
