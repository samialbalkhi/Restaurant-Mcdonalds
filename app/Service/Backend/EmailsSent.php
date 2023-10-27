<?php

namespace App\Service\Backend;
use App\Models\Answering_job_application;

class EmailsSent
{
    public function index()
    {
        return 
        Answering_job_application::with(['EmploymentApplication:id,email,first_name'])->paginate();
    }

    public function getAnswering(Answering_job_application $Answering_job_application)
    {
        return 
        $Answering_job_application->find($Answering_job_application->id);
    }
}
