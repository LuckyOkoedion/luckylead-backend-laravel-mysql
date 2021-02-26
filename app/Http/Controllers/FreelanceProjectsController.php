<?php

namespace App\Http\Controllers;

use App\Models\FreelanceProjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FreelanceProjectsController extends Controller
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

        $result = FreelanceProjects::all();

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

        $result = FreelanceProjects::create([
            'job' => $request->input('job'),
            'name' => $request->input('name'),
            'created_by' => $request->user()->id,
            'description' => $request->input('description'),
            'skill_set' => $request->input('skill_set'),
            'limitation' => $request->input('limitation'),
            'charter' => $request->input('charter'),
            'original_deadline' => $request->input('original_deadline'),
            'original_cost' => $request->input('original_cost'),
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
     * @param  \App\Models\FreelanceProjects  $FreelanceProjects
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelanceProjects::where('id',$id)->get();

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
     * @param  \App\Models\FreelanceProjects  $FreelanceProjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = FreelanceProjects::find($id);
        $update->assigned_to = $request->input('assigned_to');
        $update->job = $request->input('job');
        $update->assigned_by = $request->user()->id;
        $update->name = $request->input('name');
        $update->deadline = $request->input('deadline');
        $update->description = $request->input('description');
        $update->skill_set = $request->input('skill_set');
        $update->limitation = $request->input('limitation');
        $update->status = $request->input('status');
        $update->charter = $request->input('charter');
        $update->original_deadline = $request->input('original_deadline');
        $update->new_deadline = $request->input('new_deadline');
        $update->original_cost = $request->input('original_cost');
        $update->new_cost = $request->input('new_cost');

        $result = $update->save();

        if ($result) {
            $data = "The project has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreelanceProjects  $FreelanceProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = FreelanceProjects::destroy($id);

        if ($result) {
            $data = "the project has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
