<?php

namespace App\Http\Controllers;

use App\Models\FreelanceOfficeDealing;
use App\Models\User;
use Illuminate\Http\Request;

class FreelanceOfficeDealingController extends Controller
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

        $record = FreelanceOfficeDealing::find($id);
        $approved = $record->approved;
 
        $record->approved = !$approved;
        $record->when_approved = $timestamp;
        $record->approved_by = $request->user()->id; 
 
        $success = $record->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
            if ($approved) {
             $data = "The freelancer has been approved successfully";
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

        $result = FreelanceOfficeDealing::create([
            'freelancer' => $request->input('freelancer'),
            'account_name' => $request->input('account_name'),
            'bank_name' => $request->input('bank_name'),
            'bank_address' => $request->input('bank_address'),
            'specialty' => $request->input('specialty'),
            'account_number' => $request->input('account_number'),
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

        $result = FreelanceOfficeDealing::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);


    }

    public function update(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = FreelanceOfficeDealing::find($id);
        $update->freelancer = $request->input('freelancer');
        $update->account_name = $request->input('account_name');
        $update->bank_name = $request->input('bank_name');
        $update->bank_address = $request->input('bank_address');
        $update->specialty = $request->input('specialty');
        $update->account_number = $request->input('account_number');

        $result = $update->save();

        if ($result) {
            $data = "The freelancer has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        


    }


  
}
