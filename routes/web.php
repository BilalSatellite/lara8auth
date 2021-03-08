<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;




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

    

});