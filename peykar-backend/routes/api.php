<?php

use App\Http\Controllers\AdminPanelController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TicketController;

//User Login And Register Requests

Route::post('register', function (Request $request) {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json(['status' => true]);
});

Route::post('login', [AuthController::class, 'login']);

//Protected Routes

Route::group(['middleware' => ['auth:sanctum', 'role:Admin']], function () {

    Route::post('create-user', function (Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status' => 204]);
    });

    Route::prefix('get')->group(function () {

        Route::get('user/{id}', [AdminPanelController::class, 'getUser']);

        Route::get('users', [AdminPanelController::class, 'getAllUsers']);

        Route::get('jobs', [AdminPanelController::class, 'getJobs']);

        Route::get('tags', [AdminPanelController::class, 'getTags']);

        Route::get('tickets', [AdminPanelController::class, 'getTickets']);

        Route::get('profiles', [AdminPanelController::class, 'getProfiles']);
    });

    Route::prefix('create')->group(function () {

        Route::post('job', [AdminPanelController::class, 'createJob']);

        Route::post('tag', [AdminPanelController::class, 'createTag']);

        Route::post('ticket', [AdminPanelController::class, 'createTicket']);

        Route::post('profile', [AdminPanelController::class, 'createProfile']);
    });

    Route::resource('admin', AdminPanelController::class);

    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
