<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use App\Http\Controllers\Controller;
use App\Service\Backend\RestaurantReviewService;

class RestaurantReviewController extends Controller
{
    public function __construct(private RestaurantReviewService $RestaurantReviewService)
    {
    }
    public function index()
    {
        return response()->json(
            $this->RestaurantReviewService->index());
    }

    public function destroy(RestaurantReview $restaurantReview)
    {
        $this->RestaurantReviewService->destroy($restaurantReview);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            200,
        );
    }
}
