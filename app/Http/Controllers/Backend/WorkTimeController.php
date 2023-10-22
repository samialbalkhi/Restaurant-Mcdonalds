<?php

namespace App\Http\Controllers\Backend;

use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\WorkTimeService;
use App\Http\Requests\Backend\WorkTimeRequest;

class WorkTimeController extends Controller
{
    private $WorkTimeService;

    public function __construct(WorkTimeService $WorkTimeService)
    {
        $this->WorkTimeService = $WorkTimeService;
    }
    public function index()
    {
        return response()->json(
            $this->WorkTimeService->index()
        );
    }
   
    public function store(WorkTimeRequest $request)
    {
        return response()->json(
            $this->WorkTimeService->store($request),201
        );
    }
    public function edit(WorkTime $WorkTime)
    {
        return response()->json(
            $this->WorkTimeService->edit($WorkTime)
        );
    }
    public function update(WorkTimeRequest $request, WorkTime $WorkTime)
    {
        
            $this->WorkTimeService->update($request, $WorkTime);
       return response()->json(['message' => 'updated successfully']);

    
    }
    public function destroy(WorkTime $WorkTime)
    {
        
            $this->WorkTimeService->destroy($WorkTime);
            return response()->json(['message' => 'Deleted successfully'], 202);
        
    }
}
