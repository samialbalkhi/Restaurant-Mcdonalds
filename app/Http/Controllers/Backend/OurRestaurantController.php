<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Ourrestaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\OurRestaurantRequest;

class OurRestaurantController extends Controller
{
    public function index()
    {
        $Ourrestaurant = Ourrestaurant::with(['section:id,name'])->get();

        $respones = [
            'Ourrestaurant' => $Ourrestaurant,
        ];

        return response($respones, 201);
    }

    public function store(OurRestaurantRequest $request, $id)
    {
        $Ourrestaurant = Ourrestaurant::get()->find($id);

        if (Storage::exists('public/' . $Ourrestaurant->image)) {
            Storage::delete('public/' . $Ourrestaurant->image);
        }
        $path = $request->image->store('image_OurRestaurant', 'public');

        $Ourrestaurant = Ourrestaurant::updateOrCreate(
            [
                'section_id' => $request->section_id,
            ],
            [
                'title' => $request->title,
                'description' => $request->description,
                'message' => $request->message,
                'image' => $path,
            ],
        );

        $respones = [
            'Ourrestaurant' => $Ourrestaurant,
        ];

        return response($respones, 201);
    }
}
