<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\JobOfferRequest;
use App\Models\EmploymentOpportunity;
use App\Models\Job_offer;
use App\Traits\ImageUploadTrait;

class JobOfferController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        return response()->json(
            Job_offer::with(['employment_opportunitie:id,name', 'details:job_offer_id,details'])->paginate());
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

        return response()->json(
            $jobOffer->find($jobOffer->id));
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
