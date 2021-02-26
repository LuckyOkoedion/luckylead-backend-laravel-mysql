<?php

namespace App\Http\Controllers;

use App\Models\ProjectStatusOptions;
use Illuminate\Http\Request;

class ProjectStatusOptionsController extends Controller
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
        $result = ProjectStatusOptions::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data,$status);
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

        $result = ProjectStatusOptions::create([
            'option' => $request->input('option')
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
     * @param  \App\Models\ProjectStatusOptions  $projectStatusOptions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProjectStatusOptions::where('id',$id)->get();

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
     * @param  \App\Models\ProjectStatusOptions  $projectStatusOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $option = ProjectStatusOptions::find($id);

        $option->option = $request->input('option');

        $result = $option->save();

        if ($result) {
            $data = "The option has been updated sucessfully";
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectStatusOptions  $projectStatusOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProjectStatusOptions::destroy($id);

        if ($result) {
            $data = "The option has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }
}
