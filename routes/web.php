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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// route for homepage view
Route::get('/home', 'HomeController@index')->name('home');


// route for question form view
Route::get('/insertquestion', 'InsertQuestionController@index');

// submit question route
Route::post('ask', 'InsertQuestionController@ask')->name('ask');