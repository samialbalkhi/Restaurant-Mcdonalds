<?php

namespace App\Http\Controllers\Backend;

use App\Models\Detail;
use App\Models\Job_offer;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\EmploymentOpportunity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Backend\JobOfferRequest;

class JobOfferController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        return response()->json(Job_offer::with(['employment_opportunitie:id,name', 'details:job_offer_id,details'])->paginate());
    }

    public function store(JobOfferRequest $request)
    {
        $path = $this->storeImage('image_jobOffer');
        $employmentOpportunity = EmploymentOpportunity::find($request->employment_opportunity_id);

        $Job_offer = $employmentOpportunity->Job_offers()->create([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
        ]);

        $jobOfferId = Job_offer::find($Job_offer->id);
        $details = [];
        for ($i = 0; $i < count($request->listOfDetails); $i++) {
            $detail = $jobOfferId->details()->create([
                'details' => $request->listOfDetails[$i]['details'],
            ]);
            $details[] = $detail;
        }
        return response()->json([$Job_offer, $details], 201);
    }

    public function edit(Job_offer $jobOffer)
    {
        $jobOffer = Job_offer::where('id', $jobOffer->id)->first();

        return response()->json($jobOffer);
    }

    public function update(JobOfferRequest $request, Job_offer $jobOffer)
    {
        $this->deleteImage($jobOffer);
        $path = $this->storeImage('image_jobOffer');

        $jobOffer->update([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
            'employment_opportunity_id' => $request->employment_opportunity_id,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Job_offer $jobOffer)
    {
        $this->deleteImage($jobOffer);

        $jobOffer->delete();

        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
