<?php

namespace App\Http\Controllers;

use App\Models\ProductFemaleFootwearSizes;
use Illuminate\Http\Request;

class ProductFemaleFootwearSizesController extends Controller
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

        $result = ProductFemaleFootwearSizes::all();

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

        $result = ProductFemaleFootwearSizes::create([
            'product' => $request->input('product'),
            'thirty_five_point_five' => $request->input('thirty_five_point_five'),
            'thirty_six' => $request->input('thirty_six'),
            'thirty_seven' => $request->input('thirty_seven'),
            'thirty_seven_point_five' => $request->input('thirty_seven_point_five'),
            'thirty_eight' => $request->input('thirty_eight'),
            'thirty_eight_point_five' => $request->input('thirty_eight_point_five'),
            'thirty_nine' => $request->input('thirty_nine'),
            'forty' => $request->input('forty'),
            'forty_point_five' => $request->input('forty_point_five'),
            'forty_one' => $request->input('forty_one'),
            'forty_two' => $request->input('forty_two'),
            'forty_two_point_five' => $request->input('forty_two_point_five'),
            'forty_three' => $request->input('forty_three'),
            'forty_four' => $request->input('forty_four'),
            'forty_four_point_five' => $request->input('forty_four_point_five'),
            'forty_six' => $request->input('forty_six'),
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
     * @param  \App\Models\ProductFemaleFootwearSizes  $ProductFemaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductFemaleFootwearSizes::where('id',$id)->get();

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
     * @param  \App\Models\ProductFemaleFootwearSizes  $ProductFemaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $update = ProductFemaleFootwearSizes::find($id);
        $update->product = $request->input('product');
        $update->thirty_five_point_five = $request->input('thirty_five_point_five');
        $update->thirty_six = $request->input('thirty_six');
        $update->thirty_seven = $request->input('thirty_seven');
        $update->thirty_seven_point_five = $request->input('thirty_seven_point_five');
        $update->thirty_eight = $request->input('thirty_eight');
        $update->thirty_eight_point_five = $request->input('thirty_eight_point_five');
        $update->thirty_nine = $request->input('thirty_nine');
        $update->forty = $request->input('forty');
        $update->forty_point_five = $request->input('forty_point_five');
        $update->forty_one = $request->input('forty_one');
        $update->forty_two = $request->input('forty_two');
        $update->forty_two_point_five = $request->input('forty_two_point_five');
        $update->forty_three = $request->input('forty_three');
        $update->forty_four = $request->input('forty_four');
        $update->forty_four_point_five = $request->input('forty_four_point_five');
        $update->forty_six = $request->input('forty_six');

        $result = $update->save();

        if ($result) {
            $data = "The Product Female Footwear Sizes has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFemaleFootwearSizes  $ProductFemaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductFemaleFootwearSizes::destroy($id);

        if ($result) {
            $data = "the item has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
