<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job_offer;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\Models\EmploymentOpportunity;
use App\Service\Backend\JobOfferService;
use App\Http\Requests\Backend\JobOfferRequest;

class JobOfferController extends Controller
{
    private $JobOfferService ;
    public function __construct(JobOfferService $JobOfferService)
    {
        $this->JobOfferService = $JobOfferService;
    }
    use ImageUploadTrait;

    public function index()
    {
        return response()->json(
            $this->JobOfferService->index());
    }

    public function store(JobOfferRequest $request)
    {
     $Job_offer = $this->JobOfferService->store($request);
        return response()->json($Job_offer, 201);
    }

    public function edit(Job_offer $jobOffer)
    {
        return response()->json(
            $this->JobOfferService->edit($jobOffer));
    }

    public function update(JobOfferRequest $request, Job_offer $jobOffer)
    {
      $this->JobOfferService->update($request, $jobOffer);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Job_offer $jobOffer)
    {
        $this->JobOfferService->destroy($jobOffer);
        return response()->json(
            [
                'message' => 'Deleted successfully',
            ],
            202,
        );
    }
}
