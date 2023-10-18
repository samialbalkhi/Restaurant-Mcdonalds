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
    private $AnsweringJobApplicationsService ;
    public function __construct(AnsweringJobApplicationsService $AnsweringJobApplicationsService)
    {
        $this->AnsweringJobApplicationsService = $AnsweringJobApplicationsService;
    }
    public function sendmail(Employment_application $employmentApplication,AnsweringJobApplicationsRequest $request)
    {
        $this->AnsweringJobApplicationsService->sendmail($employmentApplication,$request);
        return response()->json(['message' => 'send mail successfully']);
    }

    public function index()
    {
        return response()->json(
           $this->AnsweringJobApplicationsService->index());
    }

    public function getAnswering(Answering_job_application $Answering_job_application)
    {
        return response()->json(
        $this->AnsweringJobApplicationsService->getAnswering($Answering_job_application));
    }
}
