<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AnsweringJobApplicationsMail;
use App\Models\Answering_job_application;
use App\Models\Employment_application;
use Illuminate\Support\Facades\Mail;

class AnsweringJobApplicationsController extends Controller
{
    public function sendmail(Request $request, $id)
    {
        $Employment_application = Employment_application::find($id);

        $data = [
            'name' => $request->name,
            'message' => $request->message,
            'description' => $request->description,
        ];

        Mail::to($Employment_application->email)->send(new AnsweringJobApplicationsMail($data));

        $Answering_job_application = Answering_job_application::create([
            'name' => $request->name,
            'message' => $request->message,
            'description' => $request->description,
            'employment_application_id' => $Employment_application->id,
        ]);
        return response()->json([
            'message' => 'Seend E-mail Success',
            'data' => $data,
            'Answering_job_application' => $Answering_job_application,
        ]);
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
    // public function destroy($id)
    // {
    //     Answering_job_application::findOrFail($id)->delete();

    //     return response()->json([
    //         'message' => 'Deleted successfully',
    //     ]);
    // }
}
