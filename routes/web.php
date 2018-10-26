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

// Public site
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/free-tools', 'PagesController@tools');
Route::get('/free-advice', 'PagesController@blog');
Route::get('/shop', 'PagesController@shop');
Route::get('/courses', 'PagesController@courses');
Route::get('/events', 'PagesController@events');
Route::get('/members/login', 'PagesController@login');
Route::get('/members/register', 'PagesController@register');
Route::get('/members/logout', 'UsersController@logout');

// Private site
Route::get('/members/dashboard/', 'DashboardController@index');
Route::get('/members/tools/', 'DashboardController@tools');
Route::get('/members/community', 'DashboardController@community');
Route::get('/members/courses', 'DashboardController@courses');
Route::get('/members/shop', 'DashboardController@shop');
Route::get('/members/settings', 'DashboardController@settings');

Auth::routes();
