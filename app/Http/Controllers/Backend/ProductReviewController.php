<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index()
    {
        $ProductReview = ProductReview::with('product:id,name', 'user:id,name')->get();

        $respones = [
            'ProductReview' => $ProductReview,
        ];

        return response($respones, 201);
    }

    public function destroy($id)
    {
        ProductReview::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
