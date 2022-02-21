<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AppointmentController;

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



Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware('auth', 'verified');
Route::get('/my_appointment', [HomeController::class, 'myappointment'])->name('myappointment');
Route::get('/delete_appointment/{id}', [HomeController::class, 'delete_appointment'])->name('delete_appointment');

Route::get('/doctor', [adminController::class, 'doctor'])->name('doctor');
Route::post('/add_doctor', [adminController::class, 'add_doctor'])->name('add_doctor');
Route::get('/show_doctors', [adminController::class, 'show_doctors'])->name('view.doctors');
Route::get('/delete_doctor/{id}', [adminController::class, 'delete_doctor'])->name('delete.doctors');
Route::get('/edit_doctor/{id}', [adminController::class, 'edit_doctor'])->name('doctor.edit');
Route::post('/update_doctor/{id}', [adminController::class, 'update_doctor'])->name('doctor.update');
Route::get('/email_view/{id}', [adminController::class, 'email_view'])->name('email_view');
Route::post('/send_email/{id}', [adminController::class, 'send_email'])->name('send_email');

Route::post('/book_appointment', [AppointmentController::class, 'book_appointment'])->name('book_appointment');
Route::get('/show_appointment', [AppointmentController::class, 'showAppointment'])->name('showAppointment');
Route::get('/approve_appointment/{id}', [AppointmentController::class, 'approve_appointment'])->name('approve_appointment');
Route::get('/cancel_appointment/{id}', [AppointmentController::class, 'cancel_appointment'])->name('cancel_appointment');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');