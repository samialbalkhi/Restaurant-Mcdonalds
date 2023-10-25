<?php
namespace App\Service\Backend;

use App\Jobs\SendMail;
use App\Models\Employment_application;
use App\Models\Answering_job_application;
use App\Http\Requests\Backend\AnsweringJobApplicationsRequest;

class AnsweringJobApplicationsService
{
    public function sendmail(Employment_application $employmentApplication ,AnsweringJobApplicationsRequest $request,)
    {
        SendMail::dispatch($employmentApplication->id, $request->all());

    }

    public function store(Employment_application $employmentApplication,AnsweringJobApplicationsRequest $request){
    
        Answering_job_application::create([
            'name' => $request->name,
            'message'=>$request->message,
            'description'=>$request->description,
            'employment_application_id'=>$employmentApplication->id,
        ]);
    }
   
}
