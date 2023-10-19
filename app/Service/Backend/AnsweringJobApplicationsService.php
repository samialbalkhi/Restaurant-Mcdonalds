<?php
namespace App\Service\Backend;

use App\Jobs\SendMail;
use App\Http\Requests\Backend\AnsweringJobApplicationsRequest;
use App\Models\Employment_application;

class AnsweringJobApplicationsService
{
    public function sendmail(Employment_application $employmentApplication ,AnsweringJobApplicationsRequest $request,)
    {
        SendMail::dispatch($employmentApplication->id, $request->all());

    }
   
}
