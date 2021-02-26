<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProjectProgressReport;
use Illuminate\Http\Request;

class FreelancerProjectProgressReportController extends Controller
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

        $result = FreelancerProjectProgressReport::all();

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

        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');

        $result = FreelancerProjectProgressReport::create([
            'project' => $request->input('project'),
            'date_submitted' => $timestamp,
            'from' => $request->user()->id,
            'title' => $request->input('title'),
            'report' => $request->input('report'),
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
     * @param  \App\Models\FreelancerProjectProgressReport  $FreelancerProjectProgressReport
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelancerProjectProgressReport::where('id',$id)->get();

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
     * @param  \App\Models\FreelancerProjectProgressReport  $FreelancerProjectProgressReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $timestamp = date('Y-m-d H:i:s');

        $update = FreelancerProjectProgressReport::find($id);
        $update->project = $request->input('project');
        $update->title = $request->input('title');
        $update->from = $request->user()->id;
        $update->date_submitted = $timestamp;
        $update->report = $request->input('report');

        $result = $update->save();

        if ($result) {
            $data = "The Project Progress Report has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreelancerProjectProgressReport  $FreelancerProjectProgressReport
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelancerProjectProgressReport::destroy($id);

        if ($result) {
            $data = "the project progress report has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
