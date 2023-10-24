<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Ourrestaurant;
use App\Http\Controllers\Controller;
use App\Service\Backend\ourRestaurantService;
use App\Http\Requests\Backend\OurRestaurantRequest;

class ourRestaurantController extends Controller
{
    private $ourRestaurantService;
    public function __construct(ourRestaurantService $ourRestaurantService)
    {
        $this->ourRestaurantService = $ourRestaurantService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->ourRestaurantService->index());
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
    public function store(OurRestaurantRequest $request)
    {
        return response()->json(
            $this->ourRestaurantService->store($request), 201);
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
    public function edit(Ourrestaurant $ourRestaurant)
    {
        return response()->json(
            $this->ourRestaurantService->edit($ourRestaurant));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurRestaurantRequest $request, Ourrestaurant $ourRestaurant)
    {
        $this->ourRestaurantService->update($request, $ourRestaurant);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ourrestaurant $ourRestaurant)
    {
        $this->ourRestaurantService->destroy($ourRestaurant);
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
