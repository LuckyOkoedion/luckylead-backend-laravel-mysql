<?php

namespace App\Http\Controllers;

use App\Models\BlogComments;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
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
        $id = Route::current()->paramenter('blogId');
        $result = BlogComments::where('blog',$id)->get();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
    }

    /**
     *  Creating a new resource.
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

        $result = BlogComments::create([
            'blog' => $request->input("blog"),
            'commenter' => $request->user()->id,
            'comment' => $request->input("comment"),
            'timestamp' => $timestamp
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
    public function hideOrShow(Request $request)
    {
        //

        $id = Route::current()->parameter('commentId');

        $blog = BlogComments::find($id);
        $show = $blog->show;
 
        $blog->show = !$show;
 
        $success = $blog->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
            if ($show) {
             $data = "The blog comment has been set to show successfully";
            }
 
            if (!$show) {
             $data = "You have just hidden the comment !";
            }
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }
 
         return response()->json($data, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogComments  $blogComments
     * @return \Illuminate\Http\Response
     */
    public function getById()
    {
        //

        $data = "";
        $status = 200;
        $id = Route::current()->parameter('commentId');

        $result = BlogComments::where("id",$id)->get();

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
     * @param  \App\Models\BlogComments  $blogComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $id = Route::current()->parameter('commentId');

        $comment = BlogComments::find($id);
 
        $comment->comment = $request->input("comment");
 
        $success = $comment->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
             $data = "The comment has been edited successfully";
       
        }else {
            $data = "operation failed to edit the comment";
            $status = 401;
        }
 
         return response()->json($data, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComments  $blogComments
     * @return \Illuminate\Http\Response
     */
    public function deleteOwnComment(Request $request)
    {
        //
        $data = "";
        $status = 200;

        $currentUser = $request->user()->id;

        $id = Route::current()->parameter('commentId');

        $comment = BlogComments::where('id',$id)->get();

        $commenter = $comment->commenter;

        if ($currentUser === $commenter) {
            $result = BlogComments::destroy($id);

            if ($result) {
                $data = "The comment has been deleted successfully.";
            } else {
                $data = "Server error. The database query failed.";
                $status = 501;
            }
            
        } else {
            $data = "Sorry, the operation failed.";
            $status = 401;
        }

        return response()->json($data,$status);
        
    }

    public function deleteOthersComment(Request $request)
    {
        //

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('commentId');
        $result = BlogComment::destroy($id);

        if ($result) {
            $data = "The comment has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data,$status);
        
    }
}
