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


}
