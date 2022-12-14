<?php

use Illuminate\Support\Facades\Route;
// Controladores Base
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ControlsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiesController;
use App\Http\Controllers\ValiditiesController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('validities', ValiditiesController::class);
    Route::resource('services', ServiesController::class);
    Route::resource('partners', PartnersController::class);
    Route::resource('controls', ControlsController::class);
});
