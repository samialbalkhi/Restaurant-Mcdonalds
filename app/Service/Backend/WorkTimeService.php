<?php
namespace App\Service\Backend;

use App\Http\Requests\Backend\WorkTimeRequest;
use App\Models\WorkTime;

class WorkTimeService
{
    public function index()
    {
        return WorkTime::all();
    }

    public function store(WorkTimeRequest $request)
    {
        $WorkTime = WorkTime::create([
            'name' => $request->name,
        ]);
        return $WorkTime;
    }

    public function edit(WorkTime $WorkTime)
    {
        return $WorkTime->find($WorkTime->id);
    }

    public function update(WorkTimeRequest $request, WorkTime $WorkTime)
    {
        $WorkTime->update([
            'name' => $request->name,
        ]);
    }

    public function destroy(WorkTime $WorkTime)
    {
        $WorkTime->delete();
    }
}
?>
