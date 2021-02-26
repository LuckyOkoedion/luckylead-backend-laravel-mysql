<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $result = Client::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');

        $data = "";
        $status = 201;

        if ($request->user()) {
            $result = Client::create([
                'first_name' => $request->user()->first_name,
                'last_name' => $request->user()->last_name,
                'email' => $request->user()->email,
                'email_verified' => $request->user()->email_verified,
                'currency' => $request->input('currency'),
                'country' => $request->input('country'),
                'postal_address' => $request->input('postal_address'),
            ]);
        } else {
            $result = Client::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'currency' => $request->input('currency'),
                'country' => $request->input('country'),
                'postal_address' => $request->input('postal_address'),
            ]);
        }

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('clientId');

        $result = Client::where('id',$id)->get();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed.";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('clientId');

        $client = Client::find($id);

        $client->first_name = $resquest->input('first_name');
        $client->last_name = $resquest->input('last_name');
        $client->email = $resquest->input('email');
        $client->currency = $resquest->input('currency');
        $client->country = $resquest->input('country');
        $client->postal_address = $resquest->input('postal_address');
        $client->email_verified = $resquest->input('email_verified');
        $client->credit_card = $resquest->input('credit_card');
        $client->amount_spent = $resquest->input('amount_spent');
        $client->owing = $resquest->input('owing');
        $client->difficult = $resquest->input('difficult');

        $result = $client->save();

        if ($result) {
            $data = "The client record has been updated successfully.";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data,$status);
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('clientId');

        $result = Client::destroy($id);

        if ($result) {
            $data = " The client has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        


    }
}
