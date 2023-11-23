<?php
namespace App\Service\Backend;

use App\Models\Driver;
use App\Models\RestaurantBranche;
use App\Http\Requests\Backend\DriverRequest;

class DriverService
{
    public function index()
    {
        return Driver::with(['restaurantBranche:id,name'])->get();
    }

    public function store(DriverRequest $request): Driver
    {
        $restaurantBranche = RestaurantBranche::find($request->restaurant_branche_id);

        return $restaurantBranche->drivers()->create(
            [
                'status' => $request->filled('status'),
            ] + $request->validated(),
        );
    }

    public function edit(Driver $driver)
    {
        return $driver;
    }

    public function update(DriverRequest $request, Driver $driver)
    {
        $driver->update(
            [
                'status' => $request->filled('status'),
            ] + $request->validated(),
        );
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
    }
}
