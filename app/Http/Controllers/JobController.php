<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        return response()->json([
            'success'   => true,
            'message'   => 'All jobs',
            'data'      => Job::all(),
        ]);
    }

    public function store(CreateJobRequest $request)
    {
        // Create the job
        $job = Job::create($request->all());

        return response()->json([
            'success'   => true,
            'message'   => 'Registration completed successfully',
            'data'      => $job
        ]);
    }

    public function get_job_by_id($id)
    {
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully retrieved job',
            'data'      => Job::find($id),
        ]);
    }

    // update job
    public function update_job_by_id($id, CreateJobRequest $request)
    {
        $job = Job::find($id);
        $job->update($request->all());
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully updated job',
            'data'      => $job
        ]);
    }


    public function delete($id, Request $request)
    {
        // Delete the job
        $job = Job::find($id);
        $job->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully deleted job',
            'data'      => $job,
        ]);
    }

}
