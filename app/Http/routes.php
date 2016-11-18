<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', 'HomeController@getIndex');
Route::get('about-us/awards/{id}/{title}', 'AboutController@getAwardsDetail');
Route::controller('about-us', 'AboutController');
Route::controller('payment/veritrans', 'Payment\VeritransController');
Route::get('testimonies/{id}/{name}', 'TestimonyController@getDetail');
Route::controller('testimonies', 'TestimonyController');
Route::get('products/lists', 'ProductController@getLists');
Route::get('products/{permalink}', 'ProductController@getCategory');
Route::get('products/{permalink}/{id}/{name}', 'ProductController@getDetail');
Route::controller('products', 'ProductController');
Route::get('activities/events/{id}/{name}', 'Activity\EventController@getEventDetail');
Route::controller('activities/events', 'Activity\EventController');
Route::get('activities/csr/{id}/{name}', 'ActivityController@getCsrDetail');
Route::get('activities/galleries/{id}/{name}', 'Activity\GalleryController@getGalleryDetail');
Route::controller('activities/galleries', 'Activity\GalleryController');
Route::controller('activities', 'ActivityController');
Route::get('articles/{permalink}', 'ArticleController@getCategory');
Route::get('articles/{permalink}/{id}/{article}', 'ArticleController@getDetail');
Route::controller('articles', 'ArticleController');
Route::controller('seminars', 'SeminarController');
Route::controller('join-our-team', 'TeamController');
Route::controller('shopping-cart', 'ShoppingCartController');
Route::controller('contact-us', 'ContactController');
Route::controller('auth', 'Auth\AuthController');
Route::controller('sales/auth', 'SalesService\AuthController');
Route::controller('sales', 'SalesServiceController');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::controller('password', 'Auth\PasswordController');
Route::group(['prefix' => 'customers'], function () {
	Route::controller('auth', 'Customer\AuthController');
	Route::controller('/', 'CustomerController');
});
Route::group(['prefix' => 'my-account', 'middleware' => 'auth'], function () {
	Route::controller('contracts', 'Account\ContractController');
	Route::controller('/', 'AccountController');
});
Route::get('invoice', function () {
	return view('vendor.admin.order.invoice');
});

Route::get('download-file/{file}', function($fileName){
    $pathFile = public_path('contents/'.$fileName);
    return response()->download($pathFile, $fileName);
});

Route::post('admin/upload-image', function () {
	$filename = str_random(30) . '.' . Request::file('file')->getClientOriginalExtension();
	Request::file('file')->move(public_path('contents'), $filename);
	$url = asset('/contents/' . $filename);

	return $url;
});