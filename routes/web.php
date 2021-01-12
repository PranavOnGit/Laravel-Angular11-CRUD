<?php

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

// Route::get('/', function () {
    Route::resource('/', 'AliedUsersController')->middleware("cors");
    
    Route::post('/createUser', 'AliedUsersController@newUser')->middleware("cors");  
    Route::post('editUser', 'AliedUsersController@updateUser')->middleware("cors");  
    Route::get('getUserById/{id}', 'AliedUsersController@getUserById')->middleware("cors");  
    Route::get('deleteUser/{id}', 'AliedUsersController@destroy')->middleware("cors"); 
    
// });
