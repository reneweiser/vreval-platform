<?php

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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('projects', 'ProjectController')
    ->except(['index'])
    ->middleware('auth');

Route::put('projects/{project}/publisher', 'ProjectPublishController@update')
    ->name('projects.publisher.edit')
    ->middleware('auth');

Route::resource('projects/{project}/forms', 'FormController')
    ->middleware('auth');