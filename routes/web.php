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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
    function(){

        Route::get('/', [
                'uses' => 'PagesController@index',
                'as' => 'index',
        ]);

        Route::match(['GET', 'POST'], '/results', [
                'uses' => 'PagesController@results',
                'as' => 'results',
        ]);

        Route::get('/details', [
                'uses' => 'PagesController@details',
                'as' => 'details',
        ]);

        Route::get('/contact', [
                'uses' => 'PagesController@contact',
                'as' => 'contact',
        ]);

        Route::get('/team', [
                'uses' => 'PagesController@team',
                'as' => 'team',
        ]);

        Route::get('/api', [
                'uses' => 'PagesController@api',
                'as' => 'api',
        ]);
    }
);