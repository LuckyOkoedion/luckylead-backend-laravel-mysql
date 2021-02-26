<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SalesController extends Controller
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

        $result = Sales::all();

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
        $result = Sales::create([
            'customer' => $request->user()->id,
            'product' => $request->input('product'),
            'date' => $timestamp,
            'trader' => $request->input('trader'),
            'paid' => $request->input('paid'),
            'payment_method' => $request->input('payment_method'),
            'delivery_address' => $request->input('delivery_address'),
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
     * @param  \App\Models\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('salesId');

        $result = Sales::where('id',$id)->get();

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
     * @param  \App\Models\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('salesId');

        $update = Sales::find($id);
        $update->customer = $request->input('customer');
        $update->product = $request->input('product');
        $update->payment_method = $request->input('payment_method');
        $update->delivery_address = $request->input('delivery_address');
        $update->delivered = $request->input('delivered');
        $update->returned = $request->input('returned');

        $result = $update->save();

        if ($result) {
            $data = "The Sales has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $Sales
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('salesId');

        $result = Sales::destroy($id);

        if ($result) {
            $data = "the item has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
