<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\ProductService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ProductRequest;

class ProductController extends Controller
{
    use ImageUploadTrait;

    private $ProductService;
    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }
    public function index()
    {
        return response()->json(
            $this->ProductService->index());
    }

    public function store(ProductRequest $request)
    {
      $product= $this->ProductService->store($request);
       return response()->json($product, 201);
       
            
    }

    public function edit(Product $product)
    {
        return response()->json(
            $this->ProductService->edit($product));
    }


    public function update(ProductRequest $request, Product $product)
    {
        
            $this->ProductService->update($request, $product);
        return response()->json(['message' => 'Updateed  successfully']);

    }

    public function destroy(Product $product)
    {
        $this->ProductService->destroy($product);
        return response()->json([
            'message' => 'Deleted successfully'
        ], 202);
    }
}
