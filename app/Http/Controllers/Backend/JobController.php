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

        return response()->json($Job);
    }

    public function store(JobRequest $request)
    {
        $job = Job::create([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        return response()->json($job, 201);
    }

    public function edit(Job $job)
    {
        $Job = Job::where('id', $job->id)->first();

        return response()->json($Job);
    }

    public function update(JobRequest $request, Job $job)
    {
        $job->update([
            'name' => $request->name,
            'worktime' => $request->worktime,
            'vacancies' => $request->vacancies,
        ]);

        return response()->json(['Job' => 'Updateed Category successfully']);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
