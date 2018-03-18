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

Route::get('/', function(){
    return view("auth.login");
});


Auth::routes();
Route::get('/home', 'Admin\HomeController@index');


Route::group(["middleware"=>["role:admin"]], function(){

    Route::resource('users', 'UserController');

    Route::get('admin/roles', ['as'=> 'admin.roles.index', 'uses' => 'Admin\RoleController@index']);
    Route::post('admin/roles', ['as'=> 'admin.roles.store', 'uses' => 'Admin\RoleController@store']);
    Route::get('admin/roles/create', ['as'=> 'admin.roles.create', 'uses' => 'Admin\RoleController@create']);
    Route::put('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
    Route::patch('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RoleController@update']);
    Route::delete('admin/roles/{roles}', ['as'=> 'admin.roles.destroy', 'uses' => 'Admin\RoleController@destroy']);
    Route::get('admin/roles/{roles}', ['as'=> 'admin.roles.show', 'uses' => 'Admin\RoleController@show']);
    Route::get('admin/roles/{roles}/edit', ['as'=> 'admin.roles.edit', 'uses' => 'Admin\RoleController@edit']);


    Route::get('admin/permissions', ['as'=> 'admin.permissions.index', 'uses' => 'Admin\PermissionController@index']);
    Route::post('admin/permissions', ['as'=> 'admin.permissions.store', 'uses' => 'Admin\PermissionController@store']);
    Route::get('admin/permissions/create', ['as'=> 'admin.permissions.create', 'uses' => 'Admin\PermissionController@create']);
    Route::put('admin/permissions/{permissions}', ['as'=> 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
    Route::patch('admin/permissions/{permissions}', ['as'=> 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update']);
    Route::delete('admin/permissions/{permissions}', ['as'=> 'admin.permissions.destroy', 'uses' => 'Admin\PermissionController@destroy']);
    Route::get('admin/permissions/{permissions}', ['as'=> 'admin.permissions.show', 'uses' => 'Admin\PermissionController@show']);
    Route::get('admin/permissions/{permissions}/edit', ['as'=> 'admin.permissions.edit', 'uses' => 'Admin\PermissionController@edit']);

    Route::resource('roleUsers', 'RoleUserController');
    Route::resource('permissionRoles', 'PermissionRoleController')->middleware("auth");
});


Route::resource('productCategories', 'ProductCategoryController');

Route::resource('productSubCategories', 'ProductSubCategoryController');

Route::resource('customers', 'CustomerController');

Route::resource('products', 'ProductController');

Route::resource('orders', 'OrderController');

Route::resource('orderDetails', 'OrderDetailController');

Route::resource('productInventories', 'ProductInventoryController');

Route::resource('productProcurements', 'ProductProcurementController');

Route::get("orders/print/{orderRef}",["as"=>"orders.print","uses"=>"OrderProcessController@print"]);
Route::get("orders/process/{orderRef}",["as"=>"orders.process","uses"=>"OrderProcessController@process"]);

Route::group(["prefix"=>"reports"], function(){

    Route::get("/products/generate","Reports\ProductReportController@loadView");
    Route::post("/products/generate","Reports\ProductReportController@generateReport");

    Route::get("/stock/balance/current","Reports\StockBalanceReport@loadCurrentBalance");

});