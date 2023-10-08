<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Category;
use App\Traits\ImageUploadTrait;

class ProductController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $product = Product::with('category:id,name')->get();

        return response($product);
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

        return response($product, 201);
    }

    public function edit(Product $product)
    {
        $categoryWithcategory = $product->load('category:id,name');

        return response()->json($categoryWithcategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if (Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $path = $request->image->store('images_product', 'public');

        $products = $product->update([
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

        return response()->json(['Updateed Category successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
