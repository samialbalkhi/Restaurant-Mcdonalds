<?php
namespace App\Service\Backend;

use App\Models\WorkTime;
use App\Models\JobOfferTime;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\WorkTimeRequest;
use App\Http\Requests\Backend\JobOfferTimeRequest;

class WorkTimeOfferService
{
    public function edit(JobOfferTime $JobOfferTime)
    {
        return JobOfferTime::where('job_offer_id', $JobOfferTime->id)->get();
    }

    public function update(JobOfferTimeRequest $request, JobOfferTime $JobOfferTime)
    {
         $JobOfferTime->update([
            'name' => $request->name,
            'job_offer_id' => $JobOfferTime->job_offer_id,
        ]);
    }
    public function destroy(JobOfferTime $JobOfferTime){

        $JobOfferTime->delete();
    }

}
