<?php
namespace App\Service\Backend;

use App\Models\Section;
use App\Models\Ourrestaurant;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\OurRestaurantRequest;

class ourRestaurantService
{
    use ImageUploadTrait;

    public function index()
    {
        return Ourrestaurant::with(['section:id,name'])->get();
    }

    public function store(OurRestaurantRequest $request)
    {

        $section = Section::find($request->section_id);

        $ourRestaurant = $section->ourrestaurants()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $this->uploadImage('image_ourRestaurant'),
        ]);

        return $ourRestaurant;
    }

    public function edit(Ourrestaurant $ourRestaurant)
    {
        return $ourRestaurant;
    }

    public function update(OurRestaurantRequest $request, Ourrestaurant $ourRestaurant)
    {
        $this->updateImage($ourRestaurant);

        $ourRestaurant->update([
            'title' => $request->title,
            'description' => $request->description,
            'section_id' => $request->section_id,
            'image' => $this->uploadImage('image_ourRestaurant'),
        ]);
    }

    public function destroy(Ourrestaurant $ourRestaurant)
    {
        $this->deleteImage($ourRestaurant);
        $ourRestaurant->delete();
    }
}
