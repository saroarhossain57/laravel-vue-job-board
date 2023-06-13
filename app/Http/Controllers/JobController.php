<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class JobController extends Controller
{

    public function all_jobs(){

        return response()->json([
            'success'   => true,
            'message'   => 'All public jobs',
            'data'      => Job::all(),
        ]);
        
    }

    public function index(Request $request)
    {

        $user = $request->user();
        $jobs = Job::where('user_id', $user->id)->get();

        return response()->json([
            'success'   => true,
            'message'   => 'All jobs',
            'data'      => $jobs,
        ]);
    }

    public function store(CreateJobRequest $request)
    {

        $user = $request->user();

        
        $job_data = $request->all();
        $job_data['user_id'] = $user->id;

        // dd($job_data);

        // Create the job
        $job = Job::create($job_data);

        return response()->json([
            'success'   => true,
            'message'   => 'Registration completed successfully',
            'data'      => $job
        ]);
    }

    public function get_job_by_id($id)
    {

        $job = Job::find($id);
        if(!$job) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Job not found',
            ], 400));
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Successfully retrieved job',
            'data'      => $job,
        ]);
    }

    // update job
    public function update_job_by_id($id, CreateJobRequest $request)
    {

        $user = $request->user();

        $job = Job::find($id);

        if(!$job) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Job not found',
            ], 400));
        }

        if($job->user_id != $user->id) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Access denied',
            ], 400));
        }

        $job->update($request->all());
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully updated job',
            'data'      => $job
        ]);
    }


    public function delete($id, Request $request)
    {

        $user = $request->user();
        $job = Job::find($id);

        if(!$job) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Job not found',
            ], 400));
        }

        if($job->user_id != $user->id) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Access denied',
            ], 400));
        }

        // Delete the job
        $job->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Successfully deleted job',
            'data'      => $job,
        ]);
    }

}
