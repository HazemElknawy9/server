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


   

Route::middleware(['affiliate'])->group(function () {
}); 

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
	Route::middleware(['auth','affiliate'])->group(function(){

	    //vendor profiles routes
        Route::match(['get','post'], 'profile','ProfileController@profile')->middleware('verified');
        Route::get('/admin/check-pwd','ProfileController@chkPassword');
	    Route::match(['get','post'], 'admin/update-pwd','ProfileController@updatePassword');

	    //client routes
        Route::resource('affiliates.orders', 'OrderController')->except(['show']);   
		Route::get('/brands', 'BrandController@brands')->middleware('verified');
		Route::get('/products', 'ProductController@products')->middleware('verified');
	});   
	Route::get('/About-us', 'AboutUsController@aboutUs');
	Route::get('/faqs', 'FaqController@faqs');
	Route::get('/tutorial', 'TutorialController@tutorial');
	Route::get('/', 'WelcomeController@index')->name('welcome'); 
	Route::get('/contact-us', 'ContactUsController@contactUs'); 
    Auth::routes();
});
Route::post('contacts','ContactUsController@store')->name('contacts.store');
Route::post('/loadmore/load_data', 'WelcomeController@load_data')->name('loadmore.load_data');
Route::post('/brands/load_data', 'BrandController@brand_load_data')->name('brands.load_data');

Auth::routes(['verify' => true]);  
Route::match(['get', 'post'], 'active/account', 'WelcomeController@activeAccount')->name('active.account');
Route::post('/affiliates-login','WelcomeController@login');

