<?php

namespace App\Http\Controllers;

use App\Models\BlogCategoryOptions;
use Illuminate\Http\Request;

class BlogCategoryOptionsController extends Controller
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
        $result = BlogCategoryOptions::all();
        

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

        // date_default_timezone_set('Africa/Lagos');
        // $timestamp = date('Y-m-d H:i:s');

        $data = "";
        $status = 201;

        $result = BlogCategoryOptions::create([
            'option' => $request->input('option'),
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
     * @param  \App\Models\BlogCategoryOptions  $blogCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = " ";
        $status = 200;
        $id = Route::current()->parameter('categoryId');
        $result = BlogCategoryOptions::where('id',$id)->get();

        if ($result) {
            $data = $result;
        }else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategoryOptions  $blogCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;
        $id = Route::current()->parameter('categoryId');
        $category = BlogCategoryOptions::find($id);
        $category->option = $request->input('option');
        $result = $category->save();

        if ($result) {
            $data = $result;
        }else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategoryOptions  $blogCategoryOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = " ";
        $status = 200;

        $id = Route::current()->parameter('categoryId');
        $result = BlogCategoryOptions::destroy();

        if ($result) {
            $data = $result;
        }else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);


    }
}
