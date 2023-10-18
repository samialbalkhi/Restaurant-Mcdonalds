<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use App\Service\Backend\ProductReviewService;

class ProductReviewController extends Controller
{
    private $ProductReviewService;
    public function __construct(ProductReviewService $productReviewService)
    {
        $this->ProductReviewService = $productReviewService;
    }
    public function index()
    {
        return response()->json(
            $this->ProductReviewService->index());
    }

    public function destroy(ProductReview $productReview)
    {
        $this->ProductReviewService->destroy($productReview);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
