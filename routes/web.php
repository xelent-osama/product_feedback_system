<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('admin/dashboard', function () {
    return view('layouts.app');
})->middleware(['auth'])->name('admin.dashboard');
Route::get('user/dashboard', function () {
    return view('layouts.userdashboard');
})->middleware(['auth'])->name('user.dashboard');


 Route::get('send-email-queue', function(){
     $form = 'nomanumar522@gmail.com';
     $name = 'osama';

     Mail::send('emails.feedback_created', [], function ($message) use ($form, $name) {
         $message->from($form, $name)
             ->to('osamaqamar867@gmail.com')
             ->subject('hello osama test email');
     });
     return response()->json(['message'=>'Mail Send Successfully!!']);
 });




require __DIR__ . '/auth.php';

Route::view('/{any}', 'dashboard')
    ->middleware('auth')
    ->where('any', '.*');
