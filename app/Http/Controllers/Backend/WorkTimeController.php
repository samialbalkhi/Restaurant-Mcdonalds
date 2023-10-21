<?php

namespace App\Http\Controllers\Backend;

use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\WorkTimeService;
use App\Http\Requests\Backend\WorkTimeRequest;

class WorkTimeController extends Controller
{
    private $workTimeService;
    public function __construct(WorkTimeService $workTimeService)
    {
        $this->workTimeService = $workTimeService;
    }
    public function edit(WorkTime $worktime)
    {
        return response()->json($this->workTimeService->edit($worktime));
    }
    public function update(WorkTimeRequest $request, WorkTime $worktime)
    {
       $this->workTimeService->update($request, $worktime);
       return response()->json(['message' => 'updated successfully']);

    }
    public function destroy(WorkTime $worktime)
    {
        $this->workTimeService->destroy($worktime);
        return response()->json(['message' => 'Deleted successfully'], 202);

    }
}
