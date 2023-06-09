<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/all-jobs', [JobController::class, 'all_jobs']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Normal Auth Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/jobs/{id}', [JobController::class, 'get_job_by_id']);
    Route::put('/jobs/{id}', [JobController::class, 'update_job_by_id']);
});

// Admin Routes

// Employee Routes
Route::middleware(['auth:sanctum', 'role:employee'])->group(function () {

    // Route::get('/users', [UserController::class, 'index']);
    // Route::post('/users', [UserController::class, 'store']);
});

// Employer Routes
Route::middleware(['auth:sanctum', 'role:employer'])->group(function () {

    Route::get('/jobs', [JobController::class, 'index']);
    Route::post('/jobs', [JobController::class, 'store']);
    Route::delete('/jobs/{id}', [JobController::class, 'delete']);
});


// Route::group(['middleware' => ['auth:api']], function () {
//     Route::get('/users', 'UserController@index');
//     Route::post('/users', 'UserController@store');
//     // Other API routes...
// });



// Route::middleware(['auth:api', 'role:admin'])->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
//     Route::post('/users', [UserController::class, 'store']);
//     // Other API routes that require the 'admin' role...
// });

// Route::middleware('customMiddleware:param1,param2')->get('/route', 'UserController@index');
