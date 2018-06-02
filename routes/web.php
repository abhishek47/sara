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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/timeline', 'HomeController@timeline')->name('timeline');

Route::post('/projects', 'ProjectController@store')->name('project.store');
Route::get('/projects/create', 'ProjectController@create')->name('project.create');
Route::get('/projects/{project}', 'ProjectController@show')->name('project.show');

Route::get('/projects/{project}/leave', 'ProjectController@leave')->name('project.leave');

Route::get('/projects/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');


Route::post('/projects/{project}/members', 'ProjectUsersController@store');

Route::get('/members/{member}/remove', 'ProjectUsersController@destroy');


Route::get('/projects/{project}/tasks', 'TasksController@index');


Route::post('/projects/{project}/tasks', 'TasksController@store');


Route::get('/projects/{project}/members/{user}/tasks', 'TasksController@get');



Route::get('/tasks/{task}/remove', 'TasksController@destroy');

Route::get('/tasks/{task}/toggle', 'TasksController@toggle');


Route::get('/projects/{project}/tasks/{task}', 'TasksController@show');

Route::get('/notifications/{count}', 'ProfileController@notifications')->name('notifications');