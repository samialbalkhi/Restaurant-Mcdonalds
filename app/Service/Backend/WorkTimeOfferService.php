<?php
namespace App\Service\Backend;

use App\Models\WorkTime;
use App\Models\JobOfferTime;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\WorkTimeRequest;
use App\Http\Requests\Backend\JobOfferTimeRequest;

class workTimeOfferService
{
    public function edit(JobOfferTime $workTimeOffer)
    {
        return JobOfferTime::where('joboffer_id', $workTimeOffer->id)->get();
    }

    public function update(JobOfferTimeRequest $request, JobOfferTime $workTimeOffer)
    {
         $workTimeOffer->update([
            'name' => $request->name,
            'joboffer_id' => $workTimeOffer->Joboffer_id,
        ]);
    }
    public function destroy(JobOfferTime $workTimeOffer){

        $workTimeOffer->delete();
    }

}
