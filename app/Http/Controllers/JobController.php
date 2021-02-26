<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Client;
use App\Models\ClientUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class JobController extends Controller
{ 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = "";
        $status = 200;

        $result = Job::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = "";
        $status = 201;

        $result = Job::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'client' => $request->user()->id,
            'attachment' => $request->input('attachment'),
            'deadline' => $request->input('deadline'),
            'cost' => $request->input('cost'),
            'date_submitted' => $request->input('date_submitted'),
            'advance_payment' => $request->input('advance_payment'),
            'balance_payment' => $request->input('balance_payment'),
        ]);

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('jobId');

        $result = Job::where('id',$id)->get();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('jobId');

        $update = Job::find($id);
        $update->description = $request->input('description');
        $update->title = $request->input('title');
        $update->client = $request->user()->id;
        $update->attachment = $request->input('attachment');
        $update->deadline = $request->input('deadline');
        $update->cost = $request->input('cost');
        $update->quality_assurer = $request->input('quality_assurer');
        $update->open = $request->input('open');
        $update->bidding = $request->input('bidding');
        $update->date_submitted = $request->input('date_submitted');
        $update->advance_payment = $request->input('advance_payment');
        $update->balance_payment = $request->input('balance_payment');
        $update->paid_in_full = $request->input('paid_in_full');

        $result = $update->save();

        if ($result) {
            $data = "The job has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('jobId');

        $result = Job::destroy($id);

        if ($result) {
            $data = "the job has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
