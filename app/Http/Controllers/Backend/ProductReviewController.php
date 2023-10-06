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
        $ProductReview = ProductReview::with('product:id,name', 'user:id,name')->get();

        $respones = [
            'ProductReview' => $ProductReview,
        ];

        return response($respones, 201);
    }

    public function destroy(ProductReviewRequest $request,$id)
    {
        
        ProductReview::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
