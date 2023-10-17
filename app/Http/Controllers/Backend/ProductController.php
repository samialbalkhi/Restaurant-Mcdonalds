<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        return response()->json(
            Product::with('category:id,name')->paginate());
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

        return response()->json($product, 201);
    }

    public function edit(Product $product)
    {
        return response()->json(
            $product->find($product->id));
    }

    /**
     * Update the specified resource in storage.
     */
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

        return response()->json(['message' => 'Updateed  successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->deleteImage($product);

        $product->delete();

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
