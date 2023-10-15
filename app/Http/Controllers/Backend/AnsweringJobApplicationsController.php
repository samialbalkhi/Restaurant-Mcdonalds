<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Mail\AnsweringJobApplicationsMail;
use App\Models\Answering_job_application;
use App\Models\Employment_application;
use Illuminate\Support\Facades\Mail;

class AnsweringJobApplicationsController extends Controller
{
    public function sendmail(Request $request, $id)
    {
        SendMail::dispatch($id, $request->all());
        return response()->json(['message' => 'send mail successfully']);
    }
    public function index()
    {
        $Answering_job_application = Answering_job_application::with(['employment_application:id,email,first_name'])->get();

        $respones = [
            'Answering_job_application' => $Answering_job_application,
        ];

        return response($respones, 201);
    }
    public function getAnswering($id)
    {
        $Answering_job_application = Answering_job_application::findOrFail($id);

        $respones = [
            'Answering_job_application' => $Answering_job_application,
        ];

        return response($respones, 201);
    }
}
