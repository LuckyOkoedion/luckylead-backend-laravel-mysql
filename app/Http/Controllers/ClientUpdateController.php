<?php

namespace App\Http\Controllers;

use App\Models\ClientUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ClientUpdateController extends Controller
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

        $result = ClientUpdate::all();

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

        $result = ClientUpdate::create([
            'client' => $request->input('client'),
            'job' => $request->input('job'),
            'update_given_by' => $request->user()->id,
            'update_type' => $request->input('update_type'),
            'content' => $request->input('content'),
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
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('updateId');

        $result = ClientUpdate::where('id',$id)->get();

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
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('updateId');

        $update = ClientUpdate::find($id);
        $update->client = $request->input('client');
        $update->job = $request->input('job');
        $update->update_given_by = $request->user()->id;
        $update->update_type = $request->input('update_type');
        $update->content = $request->input('content');
        $update->attachment = $request->input('attachment');

        $result = $update->save();

        if ($result) {
            $data = "The client update has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('updateId');

        $result = ClientUpdate::destroy($id);

        if ($result) {
            $data = "the client update has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
