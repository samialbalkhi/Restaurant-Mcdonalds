<?php
namespace App\Service\Backend;

use App\Models\ProductReview;
use App\Models\RestaurantReview;
use Illuminate\Support\Facades\DB;

class RestaurantReviewService
{
    public function index()
    {
        $reviews = RestaurantReview::select(
            'restaurant_branche_id',
             'user_id', 
             'rating', 
             'comment',
             'review_type', 
             'title', DB::raw('AVG(rating) as avg_rating'))
            ->groupBy('restaurant_branche_id', 'user_id', 'rating', 'comment', 'review_type', 'title')
            ->with(['restaurantBranche:id,name', 'user:id,name'])
            ->paginate();

        return $reviews;
    }

    public function destroy(RestaurantReview $restaurantReview)
    {
        $restaurantReview->delete();
    }
}
