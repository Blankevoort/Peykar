<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;

// Profile Controllers

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ProfileControllers\BooksController;
use App\Http\Controllers\ProfileControllers\LangsController;
use App\Http\Controllers\ProfileControllers\AwardsController;
use App\Http\Controllers\ProfileControllers\SkillsController;
use App\Http\Controllers\ProfileControllers\CoursesController;
use App\Http\Controllers\ProfileControllers\ActivitiesController;
use App\Http\Controllers\ProfileControllers\EducationsController;
use App\Http\Controllers\ProfileControllers\SoftwareSkillsController;
use App\Http\Controllers\ProfileControllers\WorkExperienceController;
use App\Http\Controllers\ProfileControllers\AcademicExperienceController;
use App\Http\Controllers\ProfileControllers\PortfolioController;

// User Existence, Login And Register Requests

Route::post('check', [AuthController::class, 'checkStatus']);

Route::post('check-duplicate', [AuthController::class, 'checkDuplicate']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('jobs', [JobController::class, "index"]);
Route::get('job/{id}', [JobController::class, "show"]);

Route::post('search/jobs', [SearchController::class, 'searchJobs']);

// Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::patch('user', [UserController::class, "update"]);

    Route::post('job', [JobController::class, "store"]);
    Route::patch('job/{id}', [JobController::class, "update"]);
    Route::delete('job/{id}', [JobController::class, "destroy"]);

    Route::resource('tags', TagController::class);
    Route::post('jobs/{id}/tags', [TagController::class, 'addTagToJob']);
    Route::delete('jobs/{id}/tags/{tagId}', [TagController::class, 'removeTagFromJob']);

    Route::resource('tickets', TicketController::class);

    Route::post('like', [LikeController::class, 'toggleLike']);

    Route::resource('request', RequestController::class);

    Route::resource('profiles', ProfileController::class);

    Route::resource('history', HistoryController::class);

    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('user-cv', [UserController::class, 'index']);

    Route::prefix('user-cv')->group(function () {

        Route::patch('about/{id}', [UserController::class, "update"]);

        Route::patch('info/{id}', [UserController::class, "update"]);

        Route::patch('email/{id}', [UserController::class, "updateEmail"]);

        Route::resource('academicExperiences', AcademicExperienceController::class);

        Route::resource('softwareSkills', SoftwareSkillsController::class);

        Route::resource('voluntaryActivities', ActivitiesController::class);

        Route::resource('awards', AwardsController::class);

        Route::resource('booksAndArticles', BooksController::class);

        Route::resource('educationCourses', CoursesController::class);

        Route::resource('educations', EducationsController::class);

        Route::resource('languages', LangsController::class);

        Route::resource('additionalSkills', SkillsController::class);

        // Route::resource('socials', SocialsController::class);

        Route::resource('workExperience', WorkExperienceController::class);

        Route::resource('formerColleagues', WorkExperienceController::class);

        Route::resource('portfolio', PortfolioController::class);
    });
});

//Admin Only Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Route::post('create-user', function (Request $request) {
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return response()->json(['status' => 204]);
    // });

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
