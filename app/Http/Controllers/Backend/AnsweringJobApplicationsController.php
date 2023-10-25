<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employment_application;
use App\Models\Answering_job_application;
use App\Service\Backend\AnsweringJobApplicationsService;
use App\Http\Requests\Backend\AnsweringJobApplicationsRequest;

class AnsweringJobApplicationsController extends Controller
{
 
    public function sendmail(AnsweringJobApplicationsService $AnsweringJobApplicationsService,Employment_application $employmentApplication, AnsweringJobApplicationsRequest $request)
    {
        // dd($request->all());
        $AnsweringJobApplicationsService->sendmail($employmentApplication, $request);
        $AnsweringJobApplicationsService->store($employmentApplication,$request);
        return response()->json(['message' => 'send mail successfully']);
    }
}
