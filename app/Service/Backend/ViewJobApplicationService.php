<?php
namespace App\Service\Backend;

use App\Models\EmploymentApplication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ViewJobApplicationService
{
    public function index()
    {
        return EmploymentApplication::paginate();
    }
    public function show(EmploymentApplication $employmentApplication)
    {
        return $employmentApplication->find($employmentApplication->id);
    }
    public function downloadCv(EmploymentApplication $employmentApplication)
    {
            $path = Storage::path('public/' . $employmentApplication->resume);
        
            return response()->download($path);
    }
}
