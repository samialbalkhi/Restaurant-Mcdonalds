<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job_offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\JobOfferRequest;

class JobOfferController extends Controller
{
    public function index()
    {
        $Job_offer = Job_offer::with(['Jobs:id,name'])->get();

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response($respones, 201);
    }
    public function store(JobOfferRequest $request)
    {
        $path = $request->image->store('image_Job_offer', 'public');
        $Job_offer = Job_offer::create([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
            'title' => $request->title,
            'job_id' => $request->job_id,
        ]);

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response($respones, 201);
    }

    public function edit($id)
    {
        $Job_offer = Job_offer::with(['Jobs:id,name'])->findOrFail($id);

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response($respones, 201);
    }

    public function update(JobOfferRequest $request, $id)
    {
        $Job_offer = Job_offer::with(['Jobs:id,name'])->find($id);
        if (Storage::exists('public/' . $Job_offer->image)) {
            Storage::delete('public/' . $Job_offer->image);
        }

        $path = $request->image->store('image_Job_offer', 'public');

        $Job_offer->update([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
            'title' => $request->title,
            'job_id' => $request->job_id,
        ]);

        $respones = [
            'Job_offer' => 'Updateed Product successfully',
        ];
        return response($respones, 201);
    }
    public function destroy($id)
    {
        $Job_offer = Job_offer::get()->find($id);

        if (Storage::exists('public/' . $Job_offer->image)) {
            Storage::delete('public/' . $Job_offer->image);
        }

        Job_offer::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
