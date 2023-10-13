<?php

use App\Http\Controllers\FeedbackSystem\CommentController;
use App\Http\Controllers\FeedbackSystem\VotingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\FeedbackSystem\FeedbackController;
use App\Http\Controllers\FeedbackSystem\UsersController;

// EMPLOYEE MANAGMENT

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


Route::apiResource('users', UsersController::class);
Route::post('upload-image', [UsersController::class, 'uploadImage'])->name('upload-image');
Route::get('/get-product', [UsersController::class, 'getProduct']);
Route::post('/voting', [VotingController::class, 'addVoting']);
Route::apiResource('comments', CommentController::class);
Route::apiResource('feedbacks', FeedbackController::class);
Route::get('/check-login-status', [UsersController::class, 'checkLoginStatus']);

// Feedback system routes
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
