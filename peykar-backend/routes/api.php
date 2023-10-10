<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;

//User Login And Register Requests

Route::post('register', function (Request $request) {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json(['status'=> true]);
});

Route::post('login', [AuthController::class, 'login']);

//Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('jobs', JobController::class);

    Route::resource('tags', TagController::class);

    Route::resource('profile', ProfileController::class);

    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
