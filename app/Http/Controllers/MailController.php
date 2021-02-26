<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MailController extends Controller
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

        $result = Mail::all();

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

        $result = Mail::create([
            'receiver' => $request->input('receiver'),
            'date_sent' => $timestamp,
            'sender' => $request->user()->id,
            'reply' => $request->input('reply'),
            'reply_to' => $request->input('reply_to'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
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
     * @param  \App\Models\Mail  $Mail
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = Mail::where('id',$id)->get();

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
     * @param  \App\Models\Mail  $Mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $timestamp = date('Y-m-d H:i:s');

        $update = Mail::find($id);
        $update->date_read = $request->input('date_read');
        $update->read = $request->input('read');

        $result = $update->save();

        if ($result) {
            $data = "The mail has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $Mail
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = Mail::destroy($id);

        if ($result) {
            $data = "the mail has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
