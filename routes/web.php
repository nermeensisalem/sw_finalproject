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

Route::get('/','FrontsideController@showHome')->name("frontside.home");
Route::get('/about','FrontsideController@showAbout')->name("frontside.about");
Route::get('/property','FrontsideController@showProperty')->name("frontside.property");
Route::get('/agent','FrontsideController@showAgent')->name("frontside.agent");
Route::get('/blog','FrontsideController@showBlog')->name("frontside.blog");
Route::get('/contact','FrontsideController@showContact')->name("frontside.contact");
Route::get('/singleproperty','FrontsideController@showSingleProperty')->name("frontside.singleProperty");
Route::get('/singleagent','FrontsideController@showSingleAgent')->name("frontside.singleAgent");
Route::get('/singleblog','FrontsideController@showSingleBlog')->name("frontside.singleBlog");


Route::get('login','AuthController@login')->name("login");
Route::post('authenticate','AuthController@authenticate')->name("authenticate");
Route::get('logout','AuthController@logout')->name("logout");
Route::get('register','AuthController@register')->name("register");
Route::post('register','AuthController@do_register')->name("do_register");




Route::namespace("Dashboard")->middleware('auth')->name("Dashboard.")->prefix("dashboard")->group(function (){
    Route::get('/','DashboardController@index');
    Route::resource('properties','PropertiesController');
    Route::resource('agents','AgentsController');
    Route::resource('blogs','BlogsController');
    Route::resource('categories','CategoriesController');
    Route::resource('comments','CommentsController');
    Route::resource('contacts','ContactsController');
    Route::resource('amenity_property','AmenityPropertyController');

});
