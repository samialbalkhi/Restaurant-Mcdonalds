<?php
namespace App\Service\Backend;

use App\Models\City;
use App\Http\Requests\Backend\CityRequest;

class CityService
{

    public function index()
    {
      return  City::all();
    }

    public function store(CityRequest $request):City
    {
       return City::create($request->validated());
    }

    public function edit(City $city)
    {
        return $city->find($city->id);
    }

    public function update(CityRequest $request,City $city)
    {
        $city->update($request->validated());
    }

    public function destroy(City $city)
    {
        $city->delete();
    }
}
