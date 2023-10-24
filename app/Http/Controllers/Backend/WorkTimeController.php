<?php

namespace App\Http\Controllers\Backend;

use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\workTimeService;
use App\Http\Requests\Backend\WorkTimeRequest;

class workTimeController extends Controller
{
    private $workTimeService;

    public function __construct(workTimeService $workTimeService)
    {
        $this->workTimeService = $workTimeService;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return response()->json(
            $this->workTimeService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(WorkTimeRequest $request)
    {
        return response()->json(
            $this->workTimeService->store($request), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkTime $workTime)
    {

        return response()->json(
            $this->workTimeService->edit($workTime));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(WorkTimeRequest $request, WorkTime $workTime)
    {
        $this->workTimeService->update($request, $workTime);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkTime $workTime)
    {
        $this->workTimeService->destroy($workTime);
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
