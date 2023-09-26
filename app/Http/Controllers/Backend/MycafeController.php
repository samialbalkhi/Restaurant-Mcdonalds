<?php

namespace App\Http\Controllers\Backend;

use App\Models\MyCafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeController extends Controller
{
    public function index()
    {
        $MyCafe = MyCafe::with(['section:id,name'])->get();

        $respones = [
            'MyCafe' => $MyCafe,
        ];

        return response($respones, 201);
    }

    public function store(MycafeRequest $request)
    {
        $pathi_mage_drinks = $request->image_drinks->store('image_drinks', 'public');
        $path_image_sweets = $request->image_sweets->store('image_sweets', 'public');
        $MyCafe = MyCafe::create([
            'title_mycafe_drinks' => $request->title_mycafe_drinks,
            'description_drinks_cold' => $request->description_drinks_cold,
            'cold_drinks' => $request->cold_drinks,
            'title_mycafe_sweets' => $request->title_mycafe_sweets,
            'description_sweets' => $request->description_sweets,
            'image_drinks' => $pathi_mage_drinks,
            'image_sweets' => $path_image_sweets,
            'section_id' => $request->section_id,
        ]);

        $respones = [
            'MyCafe' => $MyCafe,
        ];

        return response($respones, 201);
    }

    public function edit(string $id)
    {
        $MyCafe = MyCafe::with(['section:id,name'])->findOrFail($id);

        $respones = [
            'MyCafe' => $MyCafe,
        ];

        return response($respones, 201);
    }

    public function update(MycafeRequest $request, string $id)
    {
        $MyCafeImage = MyCafe::get()->find($id);

        if (Storage::exists('public/' . $MyCafeImage->image_drinks)) {
            Storage::delete('public/' . $MyCafeImage->image_drinks);
        }

        if (Storage::exists('public/' . $MyCafeImage->image_sweets)) {
            Storage::delete('public/' . $MyCafeImage->image_sweets);
        }

        $pathi_mage_drinks = $request->image_drinks->store('image_drinks', 'public');
        $path_image_sweets = $request->image_sweets->store('image_sweets', 'public');

        $MyCafeImage->update([
            'title_mycafe_drinks' => $request->title_mycafe_drinks,
            'description_drinks_cold' => $request->description_drinks_cold,
            'cold_drinks' => $request->cold_drinks,
            'title_mycafe_sweets' => $request->title_mycafe_sweets,
            'description_sweets' => $request->description_sweets,
            'image_drinks' => $pathi_mage_drinks,
            'image_sweets' => $path_image_sweets,
            'section_id' => $request->section_id,
        ]);

        $respones = [
            'Product' => 'Updateed Product successfully',
        ];
        return response($respones, 201);
    }

    public function destroy(string $id)
    {
        $MyCafeImage = MyCafe::get()->find($id);

        if (Storage::exists('public/' . $MyCafeImage->image_drinks)) {
            Storage::delete('public/' . $MyCafeImage->image_drinks);
        }

        if (Storage::exists('public/' . $MyCafeImage->image_sweets)) {
            Storage::delete('public/' . $MyCafeImage->image_sweets);
        }

        MyCafe::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
