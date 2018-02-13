<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', 'UserAPIController');

Route::get('admin/categories', 'Admin\CategoryAPIController@index');
Route::post('admin/categories', 'Admin\CategoryAPIController@store');
Route::get('admin/categories/{categories}', 'Admin\CategoryAPIController@show');
Route::put('admin/categories/{categories}', 'Admin\CategoryAPIController@update');
Route::patch('admin/categories/{categories}', 'Admin\CategoryAPIController@update');
Route::delete('admin/categories{categories}', 'Admin\CategoryAPIController@destroy');

Route::get('admin/sub_categories', 'Admin\SubCategoryAPIController@index');
Route::post('admin/sub_categories', 'Admin\SubCategoryAPIController@store');
Route::get('admin/sub_categories/{sub_categories}', 'Admin\SubCategoryAPIController@show');
Route::put('admin/sub_categories/{sub_categories}', 'Admin\SubCategoryAPIController@update');
Route::patch('admin/sub_categories/{sub_categories}', 'Admin\SubCategoryAPIController@update');
Route::delete('admin/sub_categories{sub_categories}', 'Admin\SubCategoryAPIController@destroy');

Route::get('admin/banks', 'Admin\BankAPIController@index');
Route::post('admin/banks', 'Admin\BankAPIController@store');
Route::get('admin/banks/{banks}', 'Admin\BankAPIController@show');
Route::put('admin/banks/{banks}', 'Admin\BankAPIController@update');
Route::patch('admin/banks/{banks}', 'Admin\BankAPIController@update');
Route::delete('admin/banks{banks}', 'Admin\BankAPIController@destroy');

Route::get('admin/merchants', 'Admin\MerchantAPIController@index');
Route::post('admin/merchants', 'Admin\MerchantAPIController@store');
Route::get('admin/merchants/{merchants}', 'Admin\MerchantAPIController@show');
Route::put('admin/merchants/{merchants}', 'Admin\MerchantAPIController@update');
Route::patch('admin/merchants/{merchants}', 'Admin\MerchantAPIController@update');
Route::delete('admin/merchants{merchants}', 'Admin\MerchantAPIController@destroy');

Route::get('admin/merchant_banks', 'Admin\MerchantBankAPIController@index');
Route::post('admin/merchant_banks', 'Admin\MerchantBankAPIController@store');
Route::get('admin/merchant_banks/{merchant_banks}', 'Admin\MerchantBankAPIController@show');
Route::put('admin/merchant_banks/{merchant_banks}', 'Admin\MerchantBankAPIController@update');
Route::patch('admin/merchant_banks/{merchant_banks}', 'Admin\MerchantBankAPIController@update');
Route::delete('admin/merchant_banks{merchant_banks}', 'Admin\MerchantBankAPIController@destroy');


Route::resource('news_letters', 'NewsLetterAPIController');


Route::get('admin/item_classes', 'Admin\ItemClassAPIController@index');
Route::post('admin/item_classes', 'Admin\ItemClassAPIController@store');
Route::get('admin/item_classes/{item_classes}', 'Admin\ItemClassAPIController@show');
Route::put('admin/item_classes/{item_classes}', 'Admin\ItemClassAPIController@update');
Route::patch('admin/item_classes/{item_classes}', 'Admin\ItemClassAPIController@update');
Route::delete('admin/item_classes{item_classes}', 'Admin\ItemClassAPIController@destroy');



Route::resource('class_attributes', 'ClassAttributeAPIController');
Route::get("subcategory/attributes/{sub_category}","ClassAttributeAPIController@loadBySubCategory");



Route::resource('product_listings', 'ProductListingAPIController');

Route::resource('product_details', 'ProductDetailAPIController');

Route::resource('product_images', 'ProductImageAPIController');