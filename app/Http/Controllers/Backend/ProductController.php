<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $Product = Product::with('category:id,name')->get();

        $respones = [
            'Product' => $Product,
        ];

        return response($respones, 201);
    }

    public function store(ProductRequest $request)
    {
        $path = $request->image->store('images_Product', 'public');
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'price' => $request->price,
            'kcal' => $request->kcal,
            'quantity' => $request->quantity,
            'featured' => $request->featured,
            'status' => $request->status,
            'category_id' => $request->status,
            'image' => $path,
        ]);

        $respones = [
            'product' => $product,
        ];

        return response($respones, 201);
    }

    public function edit(string $id)
    {
        $Product = Product::with(['category:id,name'])->findOrFail($id);

        $respones = [
            'Product' => $Product,
        ];

        return response($respones, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $ProductImage = Product::get()->find($id);

        if (Storage::exists('public/' . $ProductImage->image)) {
            Storage::delete('public/' . $ProductImage->image);
        }

        $path = $request->image->store('images_Product', 'public');

        $ProductImage->update([
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

        $respones = [
            'Product' => 'Updateed Product successfully',
            'image' => $path,
        ];
        return response($respones, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProductImage = Product::get()->find($id);

        if (Storage::exists('public/' . $ProductImage->image)) {
            Storage::delete('public/' . $ProductImage->image);
        }

        Product::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
