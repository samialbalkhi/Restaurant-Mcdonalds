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

        return 
            Ourrestaurant::with(['section:id,name'])->get();
    }

    public function store(OurRestaurantRequest $request)
    {
        $path = $this->storeImage('image_ourRestaurant');

        $section = Section::find($request->section_id);

        $ourRestaurant = $section->ourrestaurants()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return $ourRestaurant;
    }

    public function edit(Ourrestaurant $ourRestaurant)
    {
        return 
            $ourRestaurant->find($ourRestaurant->id);
    }

    public function update(OurRestaurantRequest $request, Ourrestaurant $ourRestaurant)
    {
        $this->deleteImage($ourRestaurant);
        $path = $this->storeImage('image_ourRestaurant');

        $ourRestaurant->update([
            'title' => $request->title,
            'description' => $request->description,
            'section_id' => $request->section_id,
            'image' => $path,
        ]);
    }

    public function destroy(Ourrestaurant $ourRestaurant)
    {
        $this->deleteImage($ourRestaurant);
        $ourRestaurant->delete();
    }
}
