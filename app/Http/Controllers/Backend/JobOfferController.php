<?php

namespace App\Http\Controllers\Backend;

use App\Models\Detail;
use App\Models\Job_offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Backend\JobOfferRequest;
use App\Models\Job;

class JobOfferController extends Controller
{
    public function index()
    {
        $Job_offerid = Job_offer::pluck('id');
        $jobOffers = Job_offer::whereIn('id', $Job_offerid)
            ->with(['Jobs:id,name', 'details:job_offer_id,details'])
            ->get();

        $respones = [
            'Job_offer' => $jobOffers,
        ];

        return response($respones, 201);
    }

    public function store(Request $request)
    {
        $path = $request->image->store('image_Job_offer', 'public');
        $Job_offer = Job_offer::create([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
            'job_id' => $request->job_id,
        ]);
        $Job_offer_id = $Job_offer->id;
        $createdDetails = [];
        for ($i = 0; $i < count($request->listOfDetails); $i++) {
            $details = Detail::create([
                'details' => $request->listOfDetails[$i]['details'],
                'job_offer_id' => $Job_offer_id,
            ]);
        }
        $createdDetails[] = $details;
        $respones = [
            'Job_offer' => $Job_offer,
            'details' => $createdDetails,
        ];

        return response()->json($respones);
    }

    public function edit($id)
    {
        $Job_offer = Job_offer::findOrFail($id);
        $job = job::get(['id', 'name']);
        $respones = [
            'Job_offer' => $Job_offer,
            'job' => $job,
        ];

        return response($respones, 201);
    }

    public function update(Request $request, $id)
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
            'job_id' => $request->job_id,
        ]);

        $respones = [
            'Job_offer' => $Job_offer,
        ];

        return response()->json($respones);
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
