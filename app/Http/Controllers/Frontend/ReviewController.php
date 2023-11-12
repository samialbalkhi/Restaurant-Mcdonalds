<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ReviewService;
use App\Http\Requests\Frontend\RestaurantReviewRequest;

class ReviewController extends Controller
{
    public function checkReview(ReviewService $reviewService, RestaurantReviewRequest $request)
    {
        return response()->json($reviewService->checkReview($request));
    }
}
