<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\Models\Ourrestaurant;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Service\Backend\OurRestaurantService;
use App\Http\Requests\Backend\OurRestaurantRequest;

class OurRestaurantController extends Controller
{
    use ImageUploadTrait;
    private $OurRestaurantService ;
    public function __construct(OurRestaurantService $OurRestaurantService)
    {
        $this->OurRestaurantService = $OurRestaurantService;
    }

    public function index()
    {

        return response()->json(
            $this->OurRestaurantService->index());
    }

    public function store(OurRestaurantRequest $request)
    {
       $ourRestaurant= $this->OurRestaurantService->store($request);
        return response()->json($ourRestaurant, 201);
    }

    public function edit(Ourrestaurant $ourRestaurant)
    {
        return response()->json(
            $this->OurRestaurantService->edit($ourRestaurant));
    }

    public function update(OurRestaurantRequest $request, Ourrestaurant $ourRestaurant)
    {
        $this->OurRestaurantService->update($request, $ourRestaurant);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Ourrestaurant $ourRestaurant)
    {
       
        $this->OurRestaurantService->destroy($ourRestaurant);
        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
