<?php
namespace App\Service\Backend;

use App\Jobs\SendMail;
use App\Http\Requests\Backend\AnsweringJobApplicationsRequest;
use App\Models\Answering_job_application;
use App\Models\Employment_application;

class AnsweringJobApplicationsService
{
    public function sendmail(Employment_application $employmentApplication ,AnsweringJobApplicationsRequest $request,)
    {
        SendMail::dispatch($employmentApplication->id, $request->all());

    }

    public function index()
    {
        return 
            Answering_job_application::with(['employment_application:id,email,first_name'])->paginate();
    }

    public function getAnswering(Answering_job_application $Answering_job_application)
    {
        return 
            $Answering_job_application->find($Answering_job_application->id);
    }
}
