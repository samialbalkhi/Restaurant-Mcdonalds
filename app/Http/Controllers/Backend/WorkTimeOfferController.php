<?php

namespace App\Http\Controllers\Backend;

use App\Models\JobOfferTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\WorkTimeOfferService;
use App\Http\Requests\Backend\JobOfferTimeRequest;

class WorkTimeOfferController extends Controller
{
    private $WorkTimeOfferService;
    public function __construct(WorkTimeOfferService $WorkTimeOfferService)
    {
        $this->WorkTimeOfferService = $WorkTimeOfferService;
    }
    public function edit(JobOfferTime $JobOfferTime)
    {
        return response()->json($this->WorkTimeOfferService->edit($JobOfferTime));
    }
    public function update(JobOfferTimeRequest $request, JobOfferTime $JobOfferTime)
    {
       $this->WorkTimeOfferService->update($request, $JobOfferTime);
       return response()->json(['message' => 'updated successfully']);

    }
    public function destroy(JobOfferTime $JobOfferTime)
    {
        $this->WorkTimeOfferService->destroy($JobOfferTime);
        return response()->json(['message' => 'Deleted successfully'], 202);

    }
}
