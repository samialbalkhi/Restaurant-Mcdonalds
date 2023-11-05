<?php
namespace App\Service\Backend;

use App\Models\RestaurantOwner;
use App\Models\RestaurantBranche;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Backend\RestaurantOwnerRequest;

class restaurantOwnerService
{
    public function index()
    {
        return RestaurantOwner::with('restaurantBranche:id,name')->get();
    }

    public function store(RestaurantOwnerRequest $request)
    {
        $restaurantBranch = RestaurantOwner::where('restaurant_branche_id', $request->restaurant_branche_id)->first();

        if ($restaurantBranch) {
            throw ValidationException::withMessages([
                'restaurant branche' => ['This restaurant already has a manager!'],
            ]);
        }
        $RestaurantOwner = RestaurantOwner::create($request->validated());
        $token = $RestaurantOwner->createToken('token-name', ['restaurantOwner'])->plainTextToken;
        return ['token' => $token, 'restaurantowner' => $RestaurantOwner];
    }
    public function edit(RestaurantOwner $restaurantOwner)
    {
        return $restaurantOwner->find($restaurantOwner->id);
    }

    public function update(RestaurantOwnerRequest $request, RestaurantOwner $restaurantOwner)
    {
        $restaurantOwner->update($request->validated());
    }

    public function destroy(RestaurantOwner $restaurantOwner)
    {
        $restaurantOwner->delete();
    }
}
