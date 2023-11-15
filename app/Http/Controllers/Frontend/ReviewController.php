<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ReviewService;
use App\Http\Requests\Frontend\RestaurantReviewRequest;

class ReviewController extends Controller
{
    public function __construct(private ReviewService $reviewService)
    {
    }
    public function checkReview(RestaurantReviewRequest $request)
    {
        return response()->json(
            $this->reviewService->checkReview($request));
    }
    public function showReview($branshId)
    {
        return response()->json(
            $this->reviewService->showReview($branshId));
    }
}
