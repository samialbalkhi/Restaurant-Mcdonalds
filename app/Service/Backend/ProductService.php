<?php

namespace App\Service\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\ProductRequest;

class ProductService
{
    use ImageUploadTrait;

    public function index()
    {
        return
            Product::with('category:id,name')->paginate();
    }

    public function store(ProductRequest $request)
    {
        $path = $this->storeImage('images_product');

        $category = Category::find($request->category_id);
        $product = $category->product()->create([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'price' => $request->price,
            'kcal' => $request->kcal,
            'quantity' => $request->quantity,
            'featured' => $request->featured,
            'status' => $request->status,
            'image' => $path,
        ]);
        return $product ;

    }

    public function edit(Product $product)
    {
        return $product->find($product->id);
            
    }

   
    public function update(ProductRequest $request, Product $product)
    {
        $this->deleteImage($product);

        $path = $this->storeImage('images_product');

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'price' => $request->price,
            'kcal' => $request->kcal,
            'quantity' => $request->quantity,
            'featured' => $request->featured,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $path,
        ]);

    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();
    }
}
