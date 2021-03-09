<?php

use Illuminate\Support\Facades\Route;

use Admin\UsersController;
//use App\Http\Controllers\UsersController;
use Admin\RoleController;
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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
    
});
//admin
Route::group(['middleware' => ['auth']], function() {

    Route::resource('alluser', UsersController::class);
    Route::resource('role', RoleController::class);

});
// Route::prefix('admin')->group(['middleware' => ['auth','role']],function () {
        
//     Route::resource('alluser', UsersController::class);
// });
// Route::group(['middleware' => ['role:admin']], function () {
//     //
// });