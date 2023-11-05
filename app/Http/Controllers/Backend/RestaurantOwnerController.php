<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\RestaurantOwner;
use App\Http\Controllers\Controller;
use App\Service\Backend\restaurantOwnerService;
use App\Http\Requests\Backend\RestaurantOwnerRequest;

class RestaurantOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private restaurantOwnerService $restaurantOwnerService)
    {
    }

    public function index()
    {
        return response()->json(
            $this->restaurantOwnerService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantOwnerRequest $request)
    {
        
        return response()->json(
            $this->restaurantOwnerService->store($request), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantOwner $restaurantOwner)
    {
        return response()->json(
            $this->restaurantOwnerService->edit($restaurantOwner));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantOwnerRequest $request, RestaurantOwner $restaurantOwner)
    {
        $this->restaurantOwnerService->update($request, $restaurantOwner);
        return response()->json(['message' => 'Updateed  successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantOwner $restaurantOwner)
    {
        $this->restaurantOwnerService->destroy($restaurantOwner);
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
