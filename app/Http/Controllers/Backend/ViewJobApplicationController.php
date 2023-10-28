<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmploymentApplication;
use App\Service\Backend\ViewJobApplicationService;

class ViewJobApplicationController extends Controller
{
    private $ViewJobApplicationService;
    public function __construct(ViewJobApplicationService $ViewJobApplicationService)
    {
        $this->ViewJobApplicationService = $ViewJobApplicationService;
    }
    public function index()
    {
        return response()->json(
            $this->ViewJobApplicationService->index());
    }
    public function show(EmploymentApplication $employmentApplication)
    {
        return response()->json(
            $this->ViewJobApplicationService->show($employmentApplication));
    }
    public function downloadCv(EmploymentApplication $employmentApplication)
    {

        return 
            $this->ViewJobApplicationService->downloadCv($employmentApplication);
    }
}
