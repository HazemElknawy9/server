<?php

Route::get('dashboard/login','LoginController@showLoginForm')->name('dashboard.login');
Route::post('/dashboard-login','LoginController@login');
Route::get('dashboard/register', 'RegisterController@showRegistrationForm')->name('dashboard.register');
Route::get('dashboard/logout','LoginController@logout');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
	Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','admin'])->group(function () {
	   Route::get('/welcome', 'WelcomeController@index')->name('welcome');
	   //vendor routes
        Route::resource('vendors', 'VendorController')->except(['show']);
        Route::get('vendors/destroy/all', 'VendorController@destroyAll')->name('vendors.destroy.all');
        Route::get('vendors/destroy/{id}', 'VendorController@destroy');
        Route::get('vendors/active/{status}/{id}', 'VendorController@vendorActive');
        //vendor profiles routes
        Route::match(['get','post'], 'profile','ProfileController@profile');
        //affiliate routes
        Route::resource('affiliates', 'AffiliateController')->except(['store','create','edit','update']);
        Route::get('affiliates/destroy/all', 'AffiliateController@destroyAll')->name('affiliates.destroy.all');
        Route::get('affiliates/destroy/{id}', 'AffiliateController@destroy');
        Route::get('affiliates/active/{status}/{id}', 'AffiliateController@affiliateActive');
        //category routes
        Route::resource('categories', 'CategoryController')->except(['show','create']);
        Route::post('categories/update', 'CategoryController@update')->name('categories.update');
        Route::get('categories/destroy/all', 'CategoryController@destroyAll')->name('categories.destroy.all');
        Route::get('categories/destroy/{id}', 'CategoryController@destroy');
        Route::get('categories/active/{status}/{id}', 'CategoryController@categoryActive');
        Route::get('categories-products', 'CategoryController@categoryProduct')->name('category.products');
        //product routes
        Route::resource('products', 'ProductController')->except(['show']);
        Route::get('products/destroyall', 'ProductController@productsDestroyall')->name('products.destroyall');
        Route::get('products/destroy/{id}', 'ProductController@destroy');
        Route::get('products/active/{status}/{id}', 'ProductController@ProductActive'); 
        //order routes
        Route::resource('orders', 'OrderController');
        Route::get('orders/destroy/{id}', 'OrderController@destroy');
        Route::get('/orders/{order}/products','OrderController@products')->name('orders.products');
        //faqs routes
        Route::resource('faqs', 'FaqController');
        Route::get('faqs/destroyall', 'FaqController@faqsDestroyall')->name('faqs.destroy.all');
        Route::get('faqs/destroy/{id}', 'FaqController@destroy');
        //About-us routes
        Route::resource('about-us', 'AboutUsController');
        //Contact us
        Route::resource('contacts', 'ContactController')->except(['show','create','store']);
        Route::post('contacts/update', 'ContactController@update')->name('contacts.update');
        Route::get('contacts/destroy/all', 'ContactController@destroyAll')->name('contacts.destroy.all');
        Route::get('contacts/destroy/{id}', 'ContactController@destroy');
        //payments routes
        Route::resource('affiliates.orders.payments', 'PaymentController')->except(['show']);
	    Route::get('/admin/check-pwd','ProfileController@chkPassword');
	    Route::match(['get','post'], 'admin/update-pwd','ProfileController@updatePassword');
	});//end of dashboard routes
});