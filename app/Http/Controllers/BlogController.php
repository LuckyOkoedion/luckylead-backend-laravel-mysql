<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //
        $data = "";
        $status = 200;
        $result = Blog::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed.";
            $status = 404;
        }
        
        return response()->json($data, $status);
    }

    /**
     * Creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');

        $data = "";
        $status = 201;

        $result = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->user()->id,
            'category' => $request->input('category'),
            'picture' => $request->input('picture'),
            'date' => $timestamp,
            'approved_by' => $request->user()->id,
            'when_approved' => $timestamp
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
     * Approve a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approveBlog(Request $request)
    {
        //

        $id = Route::current()->parameter('id');

       $blog = Blog::find($id);
       $approved = $blog->approved;

       $blog->approved = !$approved;

       $success = $blog->save();

       $data = " ";
       $status = 200;

       if ($success) {

           if ($approved) {
            $data = "The blog titled {$blog->title} has been approved successfully";
           }

           if (!$approved) {
            $data = "You have just banned the blog titled {$blog->title} !";
           }
       }

       if (!$success) {
       $data = "operation failed to approve or ban the blog";
       $status = 401;
    }

        return response()->json($data, $status);
    }


       /**
     * Approve a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addClap(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');
        $blog = Blog::find($id);
        $claps = $blog->claps;
        $blog->claps = $claps + 1;

        $result = $blog->save();

        if ($result) {
            $data = "The blog clap has been updated successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function getById(Request $request)
    {
        //
       $data = "";
       $status = 200;
       $id = Route::current()->parameter('id');
       $result = Blog::where('id',$id)->get();

       if ($result) {
           $data = $result;
       } else {
           $data = "Sorry, the query failed";
           $status = 404;
       }

       return response()->json($data,$status);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function updateOwnBlog(Request $request)
    {
        //

       $data = "";
       $status = 200;

       $id = Route::current()->parameter('id');
       $blog = Blog::find($id);
       $author = $blog->author;
       $currentUser = $request->user()->id;

       if ($currentUser === $author) {
           $blog->title = $request->input('title');
           $blog->content = $request->input('content');
           $blog->category = $request->input('category');
           $blog->picture = $request->input('picture');
           $result = $blog->save();

           if ($result) {
               $data = "The blog has been updated successfully";
           }
       } else {
           $data = "Operation failed; either because you are not the author of the blog or a query error.";
           $status = 401;
       }
       
    }

    public function updateOthersBlog(Request $request, Blog $blog)
    {
        //

        $data = "";
        $status = 200;
        $id = Route::current()->parameter('id');
        $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->category = $request->input('category');
        $blog->picture = $request->input('picture');
        $result = $blog->save();

        if ($result) {
            $data = "The blog has been updated successfully";
        } else {
            $data = "Sorry, the operation failed";
        }

        return response()->json($data, $status);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function deleteOwnBlog(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $blog = Blog::find($id);

        $currentUser = $request->user()->id;

        $author = $blog->author;

        if ($currentUser === $author) {
            $result = Blog::destroy($id);

            if ($result) {
                $data = "The blog has been deleted successfully";
            } else {
                $data = "Server could not perform delete";
                $status = 401;
            }
            
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }
        
        return response()->json($data, $status);
    }

    public function deleteOthersBlog(Request $request)
    {
        //

        $data = "";
        $status = 200;
        $id = Route::current()->parameter('id');
        $result = Blog::destroy($id);

        if ($result) {
            $data = "The item blog been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }
        
        return response()->json($data, $status);
    }
}
