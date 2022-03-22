<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//To get all users
Route::get('users', [UserController::class, 'getUser']);

//To get specific user by id 
Route::get('user/{id}', [UserController::class, 'getUserById']);

//To add user
Route::post('addUser', [UserController::class, 'addUser']);

//To update user
Route::put('updateUser/{id}', [UserController::class, 'updateUserById']);

//To delete user
Route::delete('deleteUser/{id}', [UserController::class, 'deleteUserById']);