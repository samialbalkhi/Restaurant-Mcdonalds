<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\JobRequest;

class JobController extends Controller
{
    public function index()
    {
        $Job = Job::all();

        $respones = [
            'Job' => $Job,
        ];

        return response($respones, 201);
    }

    public function store(JobRequest $request)
    {
        $job = Job::create([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        $respones = [
            'Job' => $job,
        ];

        return response($respones, 201);
    }

    public function edit($id)
    {
        $Job = Job::findOrFail($id);

        $respones = [
            'Job' => $Job,
        ];

        return response($respones, 201);
    }

    public function update(JobRequest $request, $id)
    {
        $Job = Job::get()->find($id);

        $Job->update([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        $respones = [
            'Job' => 'Updateed Category successfully',
        ];
        return response($respones, 201);
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
