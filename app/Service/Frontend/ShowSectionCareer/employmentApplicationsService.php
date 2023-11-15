<?php

namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\EmploymentApplication;
use App\Http\Requests\Backend\EmploymentApplicationRequest;

class employmentApplicationsService
{
    public function store(EmploymentApplicationRequest $request): EmploymentApplication
    {
        $path = $request->resume->store('resume', 'public');
        return EmploymentApplication::create([
            'gender' => $request->gender,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'city' => $request->city,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'company_name' => $request->company_name,
            'office_location' => $request->office_location,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'expire_date' => $request->expire_date,
            'i_currently_work_here' => $request->i_currently_work_here,
            'resume' => $path,
            'message' => $request->message,
        ]);
    }
}
