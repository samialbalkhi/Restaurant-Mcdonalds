<?php
namespace App\Service\Backend;

use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\WorkTimeRequest;

class WorkTimeService
{
    public function edit(WorkTime $worktime)
    {
        return WorkTime::where('employment_opportunity_id', $worktime->id)->get();
    }

    public function update(WorkTimeRequest $request, WorkTime $worktime)
    {
         $worktime->update([
            'name' => $request->name,
            'employment_opportunity_id' => $worktime->employment_opportunity_id,
        ]);
    }
    public function destroy(WorkTime $worktime){

        $worktime->delete();
    }

}
