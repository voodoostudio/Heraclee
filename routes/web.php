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
        Route::get('/countries/france', [
                'uses' => 'PagesController@index',
                'as' => 'france',
        ]);
        Route::get('/countries/swiss', [
                'uses' => 'PagesController@index',
                'as' => 'swiss',
        ]);
        Route::get('/countries/usa', [
                'uses' => 'PagesController@index',
                'as' => 'usa',
        ]);
        Route::get('/countries/mauritius', [
                'uses' => 'PagesController@index',
                'as' => 'mauritius',
        ]);

        Route::match(['GET', 'POST'], '/achat/results', [
                'uses' => 'PagesController@results',
                'as' => 'results',
        ]);

        Route::match(['GET', 'POST'], '/locations/results', [
            'uses' => 'PagesController@locations',
            'as' => 'locations',
        ]);

        Route::get('/achat/details', [
                'uses' => 'PagesController@details',
                'as' => 'details',
        ]);

        Route::get('/locations/details', [
            'uses' => 'PagesController@locationsDetails',
            'as' => 'locationsDetails',
        ]);

        Route::get('/news', [
                'uses' => 'PagesController@news',
                'as' => 'news',
        ]);

        Route::get('/news_details', [
                'uses' => 'PagesController@news_details',
                'as' => 'news_details',
        ]);

        Route::get('/news_admin', [
                'uses' => 'PagesController@news_admin',
                'as' => 'news_admin',
        ]);

        Route::get('/news_edit', [
                'uses' => 'PagesController@news_edit',
                'as' => 'news_edit',
        ]);

        Route::get('/newsletters', [
                'uses' => 'PagesController@newsletters',
                'as' => 'newsletters',
        ]);

        Route::get('/contact', [
                'uses' => 'PagesController@contact',
                'as' => 'contact',
        ]);

        Route::post('/contact', [
                'uses' => 'PagesController@postContact',
                'as' => 'contact.post'
        ]);

        Route::post('/newsletter', [
            'uses' => 'PagesController@newsletter',
            'as' => 'newsletter',
        ]);

        Route::post('/contact-agent', [
            'uses' => 'PagesController@postContactToAgent',
            'as' => 'contact.post.agent',
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