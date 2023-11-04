<?php

namespace App\Http\Controllers\Backend;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\DriverService;
use App\Http\Requests\Backend\DriverRequest;

class DriverController extends Controller
{
    public function __construct(private DriverService $driverService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->driverService->index());
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
    public function store(DriverRequest $request)
    {
        return response()->json($this->driverService->store($request));
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
    public function edit(Driver $driver)
    {
        return response()->json( $this->driverService->edit($driver));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $this->driverService->update($request, $driver);
        return response()->json(['message' => 'Updateed  successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $this->driverService->destroy($driver);
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
