<?php
namespace App\Service\Backend;

use App\Models\Joboffer;
use App\Traits\ImageUploadTrait;
use App\Models\EmploymentOpportunity;
use App\Http\Requests\Backend\JobOfferRequest;

class jobOfferService
{
    use ImageUploadTrait;

    public function index()
    {
        return Joboffer::with(['employment_opportunitie:id,name', 'details:joboffer_id,details'])->paginate();
    }

    public function store(JobOfferRequest $request)
    {
        $employmentOpportunity = EmploymentOpportunity::find($request->employment_opportunity_id);

        $Joboffer = $employmentOpportunity->Joboffers()->create([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $this->uploadImage('image_jobOffer'),
        ]);

        $jobOfferId = Joboffer::find($Joboffer->id);
        $details = [];
        for ($i = 0; $i < count($request->listOfDetails); $i++) {
            $detail = $jobOfferId->details()->create([
                'details' => $request->listOfDetails[$i]['details'],
            ]);
            $details[] = $detail;
        }

        $jobOfferId = Joboffer::find($Joboffer->id);
        $worktimes = [];

        for ($i = 0; $i < count($request->listOfworktime); $i++) {
            $worktime = $jobOfferId->jobOfferTimes()->create([
                'name' => $request->listOfworktime[$i]['worktime'],
            ]);

            $worktimes[] = $worktime;
        }

        return ['Joboffer' => $Joboffer, 'details' => $details, 'worktimes' => $worktimes];
    }

    public function edit(Joboffer $jobOffer)
    {
        return $jobOffer;
    }

    public function update(JobOfferRequest $request, Joboffer $jobOffer)
    {
        $this->updateImage($jobOffer);
        $path = $this->uploadImage('image_jobOffer');

        $jobOffer->update([
            'location' => $request->location,
            'franchisee' => $request->franchisee,
            'description' => $request->description,
            'image' => $path,
            'employment_opportunity_id' => $request->employment_opportunity_id,
        ]);
    }

    public function destroy(Joboffer $jobOffer)
    {
        $this->deleteImage($jobOffer);

        $jobOffer->delete();
    }
}
