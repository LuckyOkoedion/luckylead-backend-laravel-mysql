<?php

namespace App\Http\Controllers;

use App\Models\TradersApplication;
use Illuminate\Http\Request;

class TradersApplicationController extends Controller
{
    public function approveOrDisapprove(Request $request)
    {
        //
        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');
        $id = Route::current()->parameter('id');

        $record = TradersApplication::find($id);
        $approved = $record->approved;
 
        $record->approved = !$approved;
        $record->approved_when = $timestamp;
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

        $result = TradersApplication::create([
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
}
