<?php

use Illuminate\Support\Facades\Route;

use Admin\UsersController;
//use App\Http\Controllers\UsersController;
use Admin\RoleController;
use Admin\PermissionController;
use App\Http\Controllers\UsersController as ControllersUsersController;
use Spatie\Permission\Middlewares\RoleMiddleware;




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
// Route::middleware(['auth', 'verified'])->group(function () {
    
// });
//admin

Route::group(['middleware' => ['auth','verified', 'role:Admin']], function () {
    Route::view('home', 'home')->name('home');
    Route::resource('alluser', UsersController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});
