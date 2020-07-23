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
Route::get('/home', 'HomeController@index')
    ->name('home');


// question form view
Route::get('/insertquestion', 'InsertController@insert_view')
    ->name('insertquestion');


// submit question 
Route::post('ask', 'InsertController@ask')
    ->name('ask');


// route to submit reply to correspond question
Route::post('/reply', 'InsertController@reply')
    ->name('reply');


//  view detail thread
Route::post('/thread', 'DetailThreadController@thread')
    ->name('thread');


//  view user all question
Route::get('/userquestion', 'DetailThreadController@myquestion')
    ->name('userquestion');


//  view user all answer
Route::get('/useranswer', 'DetailThreadController@myanswer')
    ->name('useranswer');

// edit user's question
Route::post('/edit','EditController@edit')
    ->name('edit');

// update user's question
Route::post('/update','EditController@update')
    ->name('update');

// delete user's question
Route::post('/delete','DeleteController@delete') 
    ->name('delete');

