<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PortfolioController extends Controller
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

        $result = Portfolio::all();

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

        $result = Portfolio::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'picture' => $request->input('picture'),
            'category' => $request->input('category'),
            'demo_url' => $request->input('demo_url'),
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
     * @param  \App\Models\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('portfolioId');

        $result = Portfolio::where('id',$id)->get();

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
     * @param  \App\Models\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('PortfolioId');

        $update = Portfolio::find($id);
        $update->description = $request->input('description');
        $update->title = $request->input('title');
        $update->picture = $request->input('picture');
        $update->category = $request->input('category');
        $update->demo_url = $request->input('demo_url');

        $result = $update->save();

        if ($result) {
            $data = "The Portfolio has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $Portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('portfolioId');

        $result = Portfolio::destroy($id);

        if ($result) {
            $data = "the job has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
