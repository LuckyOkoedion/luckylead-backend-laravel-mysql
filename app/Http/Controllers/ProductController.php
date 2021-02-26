<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
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

        $result = Product::all();

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

        // date_default_timezone_set('Africa/Lagos');
        // $timestamp = date('Y-m-d H:i:s');

        $result = Product::create([
            'name' => $request->input('name'),
            'seller' => $request->user()->id,
            'description' => $request->input('description'),
            'picture' => $request->input('picture'),
            'male_dress' => $request->input('male_dress'),
            'male_footwear' => $request->input('male_footwear'),
            'female_dress' => $request->input('female_dress'),
            'female_footwear' => $request->input('female_footwear'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'in_stock' => $request->input('in_stock'),
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
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = Product::where('id',$id)->get();

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
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $timestamp = date('Y-m-d H:i:s');

        $update = Product::find($id);
        $update->name = $request->input('name');
        $update->description = $request->input('description');
        $update->picture = $request->input('picture');
        $update->male_dress = $request->input('male_dress');
        $update->male_footwear = $request->input('male_footwear');
        $update->female_dress = $request->input('female_dress');
        $update->female_footwear = $request->input('female_footwear');
        $update->category = $request->input('category');
        $update->quantity = $request->input('quantity');
        $update->price = $request->input('price');
        $update->in_stock = $request->input('in_stock');

        $result = $update->save();

        if ($result) {
            $data = "The Product has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = Product::destroy($id);

        if ($result) {
            $data = "the product has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
