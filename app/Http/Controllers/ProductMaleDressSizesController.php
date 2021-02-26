<?php

namespace App\Http\Controllers;

use App\Models\ProductMaleDressSizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductMaleDressSizesController extends Controller
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

        $result = ProductMaleDressSizes::all();

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

        $result = ProductMaleDressSizes::create([
            'product' => $request->input('product'),
            'xs' => $request->input('xs'),
            's' => $request->input('s'),
            'm' => $request->input('m'),
            'l' => $request->input('l'),
            'xl' => $request->input('xl'),
            'xxl' => $request->input('xxl'),
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
     * @param  \App\Models\ProductMaleDressSizes  $ProductMaleDressSizes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductMaleDressSizes::where('id',$id)->get();

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
     * @param  \App\Models\ProductMaleDressSizes  $ProductMaleDressSizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $update = ProductMaleDressSizes::find($id);
        $update->product = $request->input('product');
        $update->xs = $request->input('xs');
        $update->s = $request->input('s');
        $update->m = $request->input('m');
        $update->l = $request->input('l');
        $update->xl = $request->input('xl');
        $update->xxl = $request->input('xxl');

        $result = $update->save();

        if ($result) {
            $data = "The Product Female Dress Sizes has been edited successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductMaleDressSizes  $ProductMaleDressSizes
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('optionId');

        $result = ProductMaleDressSizes::destroy($id);

        if ($result) {
            $data = "the item has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }
}
