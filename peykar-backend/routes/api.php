<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HistoryController;
// Import Profile Controllers

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ProfileControllers\BooksController;
use App\Http\Controllers\ProfileControllers\LangsController;
use App\Http\Controllers\ProfileControllers\AwardsController;
use App\Http\Controllers\ProfileControllers\SkillsController;
use App\Http\Controllers\ProfileControllers\CoursesController;
use App\Http\Controllers\ProfileControllers\SocialsController;
use App\Http\Controllers\ProfileControllers\PartnersController;
use App\Http\Controllers\ProfileControllers\ActivitiesController;
use App\Http\Controllers\ProfileControllers\EducationsController;
use App\Http\Controllers\ProfileControllers\AcademicExperienceController;

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

// Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('jobs', JobController::class);

    Route::resource('tags', TagController::class);

    Route::resource('tickets', TicketController::class);

    Route::resource('like', LikeController::class);

    Route::resource('request', RequestController::class);

    Route::patch('request', [RequestController::class, 'update']);

    Route::resource('profiles', ProfileController::class);

    Route::get('search', [JobController::class, 'search']);

    Route::resource('history', HistoryController::class);

    Route::post('logout', [AuthController::class, 'logout']);


    Route::prefix('user-cv')->group(function () {

        Route::resource('academic-exp', AcademicExperienceController::class);

        Route::resource('activity', ActivitiesController::class);

        Route::resource('awards', AwardsController::class);

        Route::resource('books', BooksController::class);

        Route::resource('courses', CoursesController::class);

        Route::resource('educations', EducationsController::class);

        Route::resource('partners', PartnersController::class);

        Route::resource('langs', LangsController::class);

        Route::resource('skills', SkillsController::class);

        Route::resource('socials', SocialsController::class);

    });

    Route::get('user', function (Request $request) {
        return $request->user()->likes;
    });
});

//Admin Only Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

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
});
