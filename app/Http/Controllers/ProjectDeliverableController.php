<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProjectDeliverable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProjectDeliverableController extends Controller
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

        $result = FreelancerProjectDeliverable::all();

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

        $result = FreelancerProjectDeliverable::create([
            'project' => $request->input('project'),
            'date_submitted' => $timestamp,
            'from' => $request->user()->id,
            'milestone_number' => $request->input('milestone_number'),
            'total_project_milestones' => $request->input('total_project_milestones'),
            'attachment' => $request->input('attachment'),
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
     * @param  \App\Models\FreelancerProjectDeliverable  $FreelancerProjectDeliverable
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelancerProjectDeliverable::where('id',$id)->get();

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
     * @param  \App\Models\FreelancerProjectDeliverable  $FreelancerProjectDeliverable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $timestamp = date('Y-m-d H:i:s');

        $update = FreelancerProjectDeliverable::find($id);
        $update->project = $request->input('project');
        $update->approved = $request->input('approved');
        $update->from = $request->user()->id;
        $update->date_submitted = $timestamp;
        $update->milestone_number = $request->input('milestone_number');
        $update->total_project_milestones = $request->input('total_project_milestones');
        $update->attachment = $request->input('attachment');

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
     * @param  \App\Models\FreelancerProjectDeliverable  $FreelancerProjectDeliverable
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelancerProjectDeliverable::destroy($id);

        if ($result) {
            $data = "the project deliverable has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
