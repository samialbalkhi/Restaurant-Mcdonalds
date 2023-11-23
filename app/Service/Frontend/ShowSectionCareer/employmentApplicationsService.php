<?php

namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\EmploymentApplication;
use App\Http\Requests\Backend\EmploymentApplicationRequest;

class employmentApplicationsService
{
    public function store(EmploymentApplicationRequest $request): EmploymentApplication
    {
        return EmploymentApplication::create([
            'resume' => $request->file('resume')->store('resume', 'public'),
        ] + $request->validated());
    }
}
