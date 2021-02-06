<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function () {
    return User::all();
});

Route::post('/user', function (Request $request) {
    $user = new User([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => $request->get('password')
    ]);

    $user->save();

    return "User created successfully !";
});