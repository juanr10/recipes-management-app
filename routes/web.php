<?php

use Illuminate\Support\Facades\Auth;
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

/**
 * Recipes management routes
 */
Route::get('/recipes',  'RecipeController@index')->name('recipe.index');
Route::get('/recipes/create',  'RecipeController@create')->name('recipe.create');
Route::post('/recipes',  'RecipeController@store')->name('recipe.store');
Route::get('/recipes/{recipe}',  'RecipeController@show')->name('recipe.show');
Route::get('/recipes/edit',  'RecipeController@edit')->name('recipe.edit');
Route::get('/recipes/destroy',  'RecipeController@destroy')->name('recipe.destroy');

Auth::routes();

