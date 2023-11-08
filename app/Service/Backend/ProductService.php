<?php

namespace App\Service\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use App\Models\RestaurantBranche;
use App\Http\Requests\Backend\ProductRequest;

class ProductService
{
    use ImageUploadTrait;

    public function index()
    {
        return Product::with('category:id,name', 'restaurantBranche:id,name')->paginate();
    }

    public function store(ProductRequest $request): Product
    {
        $path = $this->uploadImage('images_product');


        $category = Category::find($request->category_id);
        return $category->product()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kcal' => $request->kcal,
            'featured' => $request->featured,
            'status' => $request->status,
            'restaurant_branche_id' => $request->restaurant_branche_id,

            'image' => $path,
        ]);
    }

    public function edit(Product $product)
    {
        return $product->find($product->id);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product);

        $path = $this->uploadImage('images_product');

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kcal' => $request->kcal,
            'featured' => $request->featured,
            'status' => $request->status,
            'restaurant_branche_id' => $request->restaurant_branche_id,
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
