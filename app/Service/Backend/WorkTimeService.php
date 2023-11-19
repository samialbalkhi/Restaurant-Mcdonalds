<?php
namespace App\Service\Backend;

use App\Http\Requests\Backend\WorkTimeRequest;
use App\Models\WorkTime;

class workTimeService
{
    public function index()
    {
        return WorkTime::all();
    }

    public function store(WorkTimeRequest $request) : WorkTime
    {
        return WorkTime::create([
            'name' => $request->name,
        ]);
         
    }

    public function edit(WorkTime $workTime)
    {
        return $workTime;
    }

    public function update(WorkTimeRequest $request, WorkTime $workTime)
    {
        $workTime->update([
            'name' => $request->name,
        ]);
    }

    public function destroy(WorkTime $workTime)
    {
        $workTime->delete();
    }
}
?>
