<?php
namespace App\Service\Backend;

use App\Traits\ImageUploadTrait;
use App\Models\RestaurantBranche;
use App\Http\Requests\Backend\RestaurantBrancheRequest;
use App\Models\City;

class restaurantBranchesService
{
    use ImageUploadTrait;

    public function index()
    {
        return RestaurantBranche::with('city:id,name')->get();
    }

    public function store(RestaurantBrancheRequest $request): RestaurantBranche
    {
        $path = $this->uploadImage('images_restaurantBranche');

        $city = City::find($request->city_id);
        return $city->restaurantBranche()->create([
            'name' => $request->name,
            'deliveryprice' => $request->deliveryprice,
            'arrivaltime' => $request->arrivaltime,
            'status' => $request->status,
            'image' => $path,
        ]);
    }

    public function edit(RestaurantBranche $restaurantBranche)
    {
        return $restaurantBranche;
    }

    public function update(RestaurantBrancheRequest $request, RestaurantBranche $restaurantBranche)
    {
        $this->updateImage($restaurantBranche);

        $path = $this->uploadImage('images_restaurantBranche');

        $restaurantBranche->update([
            'name' => $request->name,
            'deliveryprice' => $request->deliveryprice,
            'arrivaltime' => $request->arrivaltime,
            'status' => $request->status,
            'image' => $path,
            'city' => $request->city,
        ]);
    }

    public function destroy(RestaurantBranche $restaurantBranche)
    {
        $this->deleteImage($restaurantBranche);
        $restaurantBranche->delete();
    }
}
