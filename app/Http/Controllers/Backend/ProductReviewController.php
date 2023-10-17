<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function index()
    {
        return response()->json(
            ProductReview::with('product:id,name', 'user:id,name')->paginate());
    }

    public function destroy(ProductReview $productReview)
    {
        $productReview->delete();

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
