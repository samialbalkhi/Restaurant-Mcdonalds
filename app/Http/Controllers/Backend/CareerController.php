<?php

namespace App\Http\Controllers\Backend;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CareerRequest;

class CareerController extends Controller
{
    public function index()
    {
        $Career = Career::with(['section:id,name'])->get();

        $respones = [
            'Career' => $Career,
        ];
        return $respones;
    }

    public function store(CareerRequest $request, $id)
    {
        $CareerImage = Career::get()->find($id);

        if (Storage::exists('public/' . $CareerImage->image)) {
            Storage::delete('public/' . $CareerImage->image);
        }
        $path = $request->image->store('image_Career', 'public');

        $Career = Career::updateOrCreate(
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
            'Career' => $Career,
        ];

        return response($respones, 201);
    }
}
