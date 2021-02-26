<?php

namespace App\Http\Controllers;

use App\Models\ProductMaleFootwearSizes;
use Illuminate\Http\Request;

class ProductMaleFootwearSizesController extends Controller
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

        $result = ProductMaleFootwearSizes::all();

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

        $result = ProductMaleFootwearSizes::create([
            'product' => $request->input('product'),
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
            'forty_five' => $request->input('forty_five'),
            'forty_five_point_five' => $request->input('forty_five_point_five'),
            'forty_six' => $request->input('forty_six'),
            'forty_seven' => $request->input('forty_seven'),
            'forty_seven_point_five' => $request->input('forty_seven_point_five'),
            'forty_eight' => $request->input('forty-eight'),
            'forty_nine' => $request->input('forty_nine'),
            'forty_nine_point_five' => $request->input('forty_nine_point_five'),
            'fifty' => $request->input('fifty'),
            'fifty_one' => $request->input('fifty_one'),
            'fifty_two' => $request->input('fifty_two'),
            'fifty_three' => $request->input('fifty_three'),
            'fifty_four' => $request->input('fifty_four'),
            'fifty_five' => $request->input('fifty_five'),
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
     * @param  \App\Models\ProductMaleFootwearSizes  $ProductMaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductMaleFootwearSizes::where('id',$id)->get();

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
     * @param  \App\Models\ProductMaleFootwearSizes  $ProductMaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $update = ProductMaleFootwearSizes::find($id);
        $update->product = $request->input('product');
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
        $update->forty_five = $request->input('forty_five');
        $update->forty_five_point_five = $request->input('forty_five_point_five');
        $update->forty_six = $request->input('forty_six');
        $update->forty_seven = $request->input('forty_seven');
        $update->forty_seven_point_five = $request->input('forty_seven_point_five');
        $update->forty_eight = $request->input('forty-eight');
        $update->forty_nine = $request->input('forty_nine');
        $update->forty_nine_point_five = $request->input('forty_nine_point_five');
        $update->fifty = $request->input('fifty');
        $update->fifty_one = $request->input('fifty_one');
        $update->fifty_two = $request->input('fifty_two');
        $update->fifty_three = $request->input('fifty_three');
        $update->fifty_four = $request->input('fifty_four');
        $update->fifty_five = $request->input('fifty_five');

        $result = $update->save();

        if ($result) {
            $data = "The Product male Footwear Sizes has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductMaleFootwearSizes  $ProductMaleFootwearSizes
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductMaleFootwearSizes::destroy($id);

        if ($result) {
            $data = "the item has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
