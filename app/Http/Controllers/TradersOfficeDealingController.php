<?php

namespace App\Http\Controllers;

use App\Models\TradersOfficeDealing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TradersOfficeDealingController extends Controller
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

        $record = TradersOfficeDealing::find($id);
        $approved = $record->approved;
 
        $record->approved = !$approved;
        $record->when_approved = $timestamp;
        $record->approved_by = $request->user()->id; 
 
        $success = $record->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
            if ($approved) {
             $data = "The trader has been approved successfully";
            }
 
            if (!$approved) {
             $data = "You have just banned the trader !";
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

        $result = TradersOfficeDealing::create([
            'trader' => $request->input('trader'),
            'account_name' => $request->input('account_name'),
            'bank_name' => $request->input('bank_name'),
            'bank_address' => $request->input('bank_address'),
            'identity_type' => $request->input('identity_type'),
            'account_number' => $request->input('account_number'),
            'identity_number' => $request->input('identity_number'),
            'id_upload' => $request->input('id_upload'),
            'contract_upload' => $request->input('contract_upload'),
            'business_office' => $request->input('business_office'),
            'brand_name' => $request->input('brand_name'),
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

        $result = TradersOfficeDealing::all();

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

        $update = TradersOfficeDealing::find($id);
        $update->trader = $request->input('trader');
        $update->account_name = $request->input('account_name');
        $update->bank_name = $request->input('bank_name');
        $update->bank_address = $request->input('bank_address');
        $update->account_number = $request->input('account_number');
        $update->brand_name = $request->input('brand_name');
        $update->business_office = $request->input('business_office');

        $result = $update->save();

        if ($result) {
            $data = "The trader has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        


    }

}
