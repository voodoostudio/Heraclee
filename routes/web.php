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

        Route::get('/france', [
                'uses' => 'PagesController@index',
                'as' => 'france',
        ]);

        Route::get('/swiss', [
                'uses' => 'PagesController@index',
                'as' => 'swiss',
        ]);
        Route::get('/usa', [
                'uses' => 'PagesController@index',
                'as' => 'usa',
        ]);
        Route::get('/mauritius', [
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

        Route::match(['GET', 'POST'], '/achat/results/france', [
            'uses' => 'PagesController@results',
            'as' => 'results_fr',
        ]);

        Route::match(['GET', 'POST'], '/locations/results/france', [
            'uses' => 'PagesController@locations',
            'as' => 'locations_fr',
        ]);

        Route::match(['GET', 'POST'], '/achat/results/swiss', [
            'uses' => 'PagesController@results',
            'as' => 'results_ch',
        ]);

        Route::match(['GET', 'POST'], '/locations/results/swiss', [
            'uses' => 'PagesController@locations',
            'as' => 'locations_ch',
        ]);

        Route::match(['GET', 'POST'], '/achat/results/usa', [
            'uses' => 'PagesController@results',
            'as' => 'results_us',
        ]);

        Route::match(['GET', 'POST'], '/locations/results/usa', [
            'uses' => 'PagesController@locations',
            'as' => 'locations_us',
        ]);

        Route::match(['GET', 'POST'], '/achat/results/mauritius', [
            'uses' => 'PagesController@results',
            'as' => 'results_za',
        ]);

        Route::match(['GET', 'POST'], '/locations/results/mauritius', [
            'uses' => 'PagesController@locations',
            'as' => 'locations_za',
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

        Route::get('/news_details/{id}', [
                'uses' => 'PagesController@news_details',
                'as' => 'news_details',
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

        Route::get('/newsletters/heraclee_newsletter', [
            'uses' => 'PagesController@newsletter_view',
            'as' => 'newsletter_view',
        ]);

        Route::get('/newsletter_details', [
            'uses' => 'PagesController@newsletter_details',
            'as' => 'newsletter_details',
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

        Route::get('/virtual-tours', [
            'uses' => 'PagesController@virtual_tours',
            'as' => 'virtual-tours',
        ]);

        Route::get('/details-tour/{id}', [
            'uses' => 'PagesController@details_virtual_tour',
            'as' => 'details-tour',
        ]);

        Route::post('/view-list', [
            'uses' => 'PagesController@view_list',
            'as' => 'view-list',
        ]);

//        Route::post('city_list/{id}/{country}', [
//            'uses' => 'PagesController@getCityList',
//            'as' => 'city_list',
//        ]);

        /* Admin Panel */

        /* CRUD POSTS */
        Route::resource('/admin/posts', 'PostsController');

        /* CRUD GALLERY */
        Route::get('/admin/gallery', 'GalleryController@index');
        Route::post('/admin/gallery', 'GalleryController@upload');
        Route::post('/admin/gallery/show', 'GalleryController@show');
        Route::get('/admin/gallery/{id}', 'GalleryController@destroy');
        Route::post('/admin/gallery/destroy', 'GalleryController@destroy_all');

        /* AUTH */
        Route::get('/login', [
            'uses' => 'PagesController@login',
            'as' => 'login',
        ]);

        Route::get('/password_recover', [
            'uses' => 'PagesController@password_recover',
            'as' => 'password_recover',
        ]);

        Auth::routes();

//        Route::get('/admin', 'PostsController@index')->name('posts');

        Route::get('/admin', 'DashboardController@index')->name('admin');
    }
);