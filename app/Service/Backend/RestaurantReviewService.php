<?php
namespace App\Service\Backend;

use App\Models\ProductReview;
use App\Models\RestaurantReview;

class RestaurantReviewService
{
    public function index()
    {
        return
        RestaurantReview::with('restaurantBranche:id,name', 'user:id,name')->paginate();
            
    }

    public function destroy(RestaurantReview $restaurantReview)
    {
        $restaurantReview->delete();

    }
}
