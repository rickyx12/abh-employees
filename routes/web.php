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

Route::get('/employee/show', 'Employees@show');
Route::post('/employee/add','Employees@add');
Route::post('/employee/update','Employees@update');
Route::post('/employee/delete','Employees@delete');

Route::get('/employee', 'Employees@index');
Route::post('employee/search', 'Employees@search');
