<?php
namespace App\Service\Backend;

use App\Models\Job_offer;
use App\Traits\ImageUploadTrait;
use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\JobOfferRequest;

class JobOfferService
{
    use ImageUploadTrait;

    public function index()
    {
        return 
            Job_offer::with(['employment_opportunitie:id,name', 'details:job_offer_id,details'])->paginate();
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

        return ['Job_offer'=> $Job_offer,'details'=> $details];
    }

    public function edit(Job_offer $jobOffer)
    {

        return 
            $jobOffer->find($jobOffer->id);
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

    }

    public function destroy(Job_offer $jobOffer)
    {
        $this->deleteImage($jobOffer);

        $jobOffer->delete();

    }
}
