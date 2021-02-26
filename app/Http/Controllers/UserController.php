<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    //

    public function createUser(Request $request) {

      $data = "";
        $status = 201;

        $result = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);

    }


      //

      public function getOtherUser(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = User::where('id',$id)->get();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }


    public function confirmPassword(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $password = User::find($id)->password;

        $inputPassword = $request->input('password');

        if (Hash::check($inputPassword, $password)) {
            $data = true;
        } else {
            $data = false;
            $status = 404;
        }

        return response()->json($data, $status);
        
    }

    public function changePassword(Request $request) {
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $update->password = $request->input('password');

        $result = $update->save();

        if ($result) {
            $data = "The User's password has been changed successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
    }

      //

      public function getAllUsers(Request $request) {
        
        $data = "";
        $status = 200;

        $result = User::all();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
    }

      //

      public function getOwnProfile(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = User::where('id',$id)->get();

        if ($result) {
            $data = $result;
        } else {
            $data = "Sorry, the query failed";
            $status = 404;
        }

        return response()->json($data, $status);
        
    }


    public function verifyEmail(Request $request) {

        $data = "";
        $status = 200;

        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $update->email_verified = $request->input('email_verified');
        $update->email_verified_at = $timestamp;

        $result = $update->save();

        if ($result) {
            $data = "The User's email has been verified successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        

    }

      //

      public function editOwnProfile(Request $request) {
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('UserId');

        $update = User::find($id);
        $update->first_name = $request->input('first_name');
        $update->last_name = $request->input('last_name');
        $update->picture = $request->input('picture');

        $result = $update->save();

        if ($result) {
            $data = "You have edited your own profile successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
        
    }

      //

      public function deleteOwnProfile(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $result = User::destroy($id);

        if ($result) {
            $data = "the user profile has been deleted successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

      //

      public function approveUser(Request $request) {

        date_default_timezone_set('Africa/Lagos');
        $timestamp = date('Y-m-d H:i:s');
        $id = Route::current()->parameter('id');

        $record = User::find($id);
        $approved = $record->approved;
 
        $record->approved = !$approved;
        $record->when_approved = $timestamp;
        $record->approved_by = $request->user()->id; 
 
        $success = $record->save();
 
        $data = " ";
        $status = 200;
 
        if ($success) {
 
            if ($approved) {
             $data = "The user has been approved successfully";
            }
 
            if (!$approved) {
             $data = "You have just banned the user !";
            }
        }
 
        if (!$success) {
        $data = "Sorry, the operation failed.";
        $status = 401;
     }
 
         return response()->json($data, $status);
        
    }

      //

      public function makeAdminUser(Request $request) {
        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $currentPerm = $update->permissions;
        $update->permissions = $currentPerm.",create_blog,manage_others_blog,manage_users,manage_freelancers_and_projects,manage_site_traffic,manage_company_portfolio,manage_own_shop_and_sales,monitor_others_shop_and_sales,manage_jobs_and_clients,manage_options,create_admin_user,read_user_profiles,manage_others_comment";
        $update->role = "admin";


        $result = $update->save();

        if ($result) {
            $data = "The User has been made an admin successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

      //

      public function makeFreelancer(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $currentPerm = $update->permissions;
        $update->permissions = $currentPerm.",work_on_projects";
        $update->role = "freelancer";

        $result = $update->save();

        if ($result) {
            $data = "The User has been made a freelancer successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

      //

      public function makeTrader(Request $request) {

        $data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $currentPerm = $update->permissions;
        $update->permissions = $currentPerm.",manage_own_shop_and_sales";
        $update->role = "trader";

        $result = $update->save();

        if ($result) {
            $data = "The User has been made a trader successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
        
    }

      //

      public function makeBlogger(Request $request) {
        $$data = "";
        $status = 200;

        $id = Route::current()->parameter('id');

        $update = User::find($id);
        $currentPerm = $update->permissions;
        $update->permissions = $currentPerm.",manage_own_blog";
        $update->role = "blogger";

        $result = $update->save();

        if ($result) {
            $data = "The User has been made a blogger successfully";
        } else {
            $data = "Sorry, the operation failed";
            $status = 401;
        }

        return response()->json($data, $status);
    }

    public function makeModerator(Request $request) {
      $$data = "";
      $status = 200;

      $id = Route::current()->parameter('id');

      $update = User::find($id);
      $currentPerm = $update->permissions;
      $update->permissions = $currentPerm.",manage_others_comment,manage_others_blog,manage_users,manage_freelancers_and_projects,manage_site_traffic,manage_company_portfolio,manage_own_shop_and_sales,monitor_others_shop_and_sales,manage_jobs_and_clients";
      $update->role = "moderator";

      $result = $update->save();

      if ($result) {
          $data = "The User has been made a moderator successfully";
      } else {
          $data = "Sorry, the operation failed";
          $status = 401;
      }

      return response()->json($data, $status);
  }
}

