<?php
namespace App\Service\Backend;

use App\Jobs\SendMail;
use App\Models\EmploymentApplication;
use App\Models\Answering_job_application;
use App\Http\Requests\Backend\AnsweringJobApplicationsRequest;

class AnsweringJobApplicationsService
{
    public function sendmail(EmploymentApplication $employmentApplication ,AnsweringJobApplicationsRequest $request,)
    {
        SendMail::dispatch($employmentApplication->id, $request->all());

    }

    public function store(EmploymentApplication $employmentApplication,AnsweringJobApplicationsRequest $request){
    
        Answering_job_application::create([
            'name' => $request->name,
            'message'=>$request->message,
            'description'=>$request->description,
            'employment_application_id'=>$employmentApplication->id,
        ]);
    }
   
}
