<?php
namespace App\Service\Backend;

use App\Models\ProductReview;

class ProductReviewService
{
    public function index()
    {
        return
         ProductReview::with('product:id,name', 'user:id,name')->paginate();
            
    }

    public function destroy(ProductReview $productReview)
    {
        $productReview->delete();

    }
}
