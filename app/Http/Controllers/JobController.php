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


}
