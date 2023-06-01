<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KursavoyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/admin_home', function(){
    return view('admin.home');
})->name('admin_home');

Route::get('/log', function () {
    return view('auth.login');
})->name('login_page');

Route::get('/reg', function () {
    return view('admin.reg', ['reg_status'=>0]);
})->name('reg');

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login_store')->name('login_store');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/reg', 'register')->name('register');
    Route::get('/update_page', 'update_page')->name('update_page');
    Route::post('/update', 'update')->name('update');

});

Route::controller(KursavoyController::class)->group(function(){
    Route::get('/add_kursavoy', 'add_kursavoy')->name('add_kursavoy');
    Route::post('/subject_select', 'subject_select')->name('subject_select');
    Route::get('/see', 'see')->name('see');
    Route::post('/see_kursavoys', 'see_kursavoys')->name('see_kursavoys');
    Route::get('/send', 'send')->name('send');
    Route::get('/goo/{k_id}', 'goo')->name('goo');
    Route::post('/juklew', 'juklew')->name('juklew');
    Route::post('/score', 'score')->name('score');
    Route::get('/see_score', 'see_score')->name('see_score');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/add/{ne}', 'add_page')->name('add_page');
    Route::get('/set_page', 'set_page')->name('set_page');
    Route::get('/see_page', 'see_page')->name('see_page');
    Route::post('/add', 'add')->name('add');
    Route::post('/set', 'set')->name('set');
});


// jiuhwsuijasioejsdoijewodisjfierodsklf
//sidjhermfbnjrkfdngoirekfnorejkfng