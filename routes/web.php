<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminUpdateController;

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

Route::get('/test', [PagesController::class, 'test'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'email.confirmed']);
Route::get('/email-confirm', [PagesController::class, 'emailConfirmed'])->name('email_confirm')->middleware(['auth', 'email.noconfirmed']);

Route::get('/admin-update', [AdminUpdateController::class, 'index'])->name('admin_update')->middleware(['auth', 'admin.check']);
Route::post('/admin-update', [AdminUpdateController::class, 'update'])->middleware(['auth', 'admin.check']);
