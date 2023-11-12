<?php
namespace App\Service\Frontend;

use App\Models\RestaurantReview;
use App\Http\Requests\Frontend\RestaurantReviewRequest;

class ReviewService
{
    public function checkReview(RestaurantReviewRequest $request)
    {
        $userId = auth()->user()->id;
        $restaurantBranchId = 1;
        $hasReviewed = RestaurantReview::where('user_id', $userId)
            ->where('restaurant_branche_id', $restaurantBranchId)
            ->where('status', true)
            ->exists();

        if ($hasReviewed) {
            return response()->json(['error' => 'You have already reviewed this restaurant.']);
        }

        RestaurantReview::create([
            'user_id' => $userId,
            'restaurant_branche_id' => $restaurantBranchId, // Correct column name
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_type' => $request->review_type,
            'title' => $request->title,
            'status' => true,
        ]);

        return response()->json(['success' => 'Review submitted successfully.', 'statusCode' => 200]);
    }
}
