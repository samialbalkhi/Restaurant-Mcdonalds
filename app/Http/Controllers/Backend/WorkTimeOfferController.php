<?php

namespace App\Http\Controllers\Backend;

use App\Models\JobOfferTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\workTimeOfferService;
use App\Http\Requests\Backend\JobOfferTimeRequest;

class workTimeOfferController extends Controller
{
    public function __construct(private workTimeOfferService $workTimeOfferService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function edit(JobOfferTime $workTimeOffer)
    {
        return response()->json(
            $this->workTimeOfferService->edit($workTimeOffer));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(JobOfferTimeRequest $request, JobOfferTime $workTimeOffer)
    {
        $this->workTimeOfferService->update($request, $workTimeOffer);
        return response()->json(['message' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOfferTime $workTimeOffer)
    {
        $this->workTimeOfferService->destroy($workTimeOffer);
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
