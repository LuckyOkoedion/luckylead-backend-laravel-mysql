<?php

namespace App\Http\Controllers;

use App\Models\BloggersOfficeDealings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BloggersOfficeDealingsController extends Controller
{
     
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FreelanceOfficeDealing  $freelanceOfficeDealing
     * @return \Illuminate\Http\Response
     */
    public function approveOrDisapprove(Request $request)
    {
        //
        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');
        $id = Route::current()->parameter('id');

        $record = BloggersOfficeDealings::find($id);
        $approved = $record->approved;
 
        $record->approved = !$approved;
        $record->approved_when = $timestamp;
        $record->approved_by = $request->user()->id; 
 
        $success = $record->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
            if ($approved) {
             $data = "The blogger has been approved successfully";
            }
 
            if (!$approved) {
             $data = "You have just banned the freelancer !";
            }
        }
 
        if (!$success) {
        $data = "Sorry, the operation failed.";
        $status = 401;
     }
 
         return response()->json($data, $status);
    }

    public function store(Request $request)
    {
        //

        $data = "";
        $status = 201;

        $result = BloggersOfficeDealings::create([
            'user' => $request->input('user'),
        ]);

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);


    }

    public function index(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $result = BloggersOfficeDealings::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);


    }

    

}
