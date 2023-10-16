<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductReviewRequest;

class ProductReviewController extends Controller
{
    public function index()
    {
        $productReview = ProductReview::with('product:id,name', 'user:id,name')->get();

        return response()->json($productReview);
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
