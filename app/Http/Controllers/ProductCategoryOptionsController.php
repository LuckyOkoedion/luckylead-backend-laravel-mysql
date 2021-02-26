<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductCategoryOptionsController extends Controller
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
        $result = ProductCategoryOptions::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data,$status);
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

        $result = ProductCategoryOptions::create([
            'option' => $request->input('option')
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
     * @param  \App\Models\ProductCategoryOptions  $productCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductCategoryOptions::where('id',$id)->get();

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
     * @param  \App\Models\ProductCategoryOptions  $productCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $option = ProductCategoryOptions::find($id);

        $option->option = $request->input('option');

        $result = $option->save();

        if ($result) {
            $data = "The option has been updated sucessfully";
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategoryOptions  $productCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductCategoryOptions::destroy($id);

        if ($result) {
            $data = "The option has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }
}
