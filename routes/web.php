<?php


Route::get('/login','LoginController@index')->name('login.index');
Route::post('/login','LoginController@verify');
Route::get('/','CustomerController@index')->name('customer.index');
Route::get('/logout','LogoutController@index')->name('logout.index');

Route::group(['middleware'=>['sess']], function(){

	Route::get('/admin', 'AdminController@index')->name('admin.index');

	Route::get('/admin/addCatagory', 'AdminController@addCatagory')->name('admin.addCatagory');
	Route::post('/admin/addCatagory', 'CatagoryController@store');

	Route::get('/admin/addSubCatagory', 'SubCatagoryController@create')->name('subcatagory.addSubCatagory');
	Route::post('/admin/addSubCatagory', 'SubCatagoryController@store');

	Route::get('/admin/addManufacturer', 'ManufacturerController@create')->name('manufacturer.addManufacturer');
	Route::post('/admin/addManufacturer', 'ManufacturerController@store');

	Route::get('/admin/addSupplier', 'SupplierController@create')->name('supplier.addSupplier');
	Route::post('/admin/addSupplier', 'SupplierController@store');

	Route::get('/admin/addProduct', 'ProductController@create')->name('product.create');
	Route::post('/admin/addProduct', 'ProductController@store');

	Route::get('/admin/addProductDetails', 'ProductDetailsController@create')->name('productdetails.addProductDetails');

	Route::get('/admin/faddProductDetails/{id}', 'ProductDetailsController@faddProductDetails')->name('productdetails.faddProductDetails');

	Route::post('/admin/faddProductDetails/{id}', 'ProductDetailsController@fstoreProductDetails');

	Route::get('/admin/showCatagory', 'CatagoryController@index')->name('catagory.showCatagory');
	Route::get('/admin/showCatagory/delete/{id}', 'CatagoryController@destroy')->name('catagory.delete');

	Route::get('/admin/modifyCatagory/{id}', 'CatagoryController@edit')->name('catagory.modifyCatagory');
	Route::post('/admin/modifyCatagory/{id}', 'CatagoryController@update');

	Route::get('/admin/showSubCatagory', 'SubCatagoryController@index')->name('subCatagory.showSubCatagory');
	Route::get('/admin/showSubCatagory/delete/{id}', 'SubCatagoryController@destroy')->name('subCatagory.delete');

	Route::get('/admin/showManufacturer', 'ManufacturerController@index')->name('manufacturer.showManufacturer');
	Route::get('/admin/showManufacturer/delete/{id}', 'ManufacturerController@destroy')->name('manufacturer.delete');

	Route::get('/admin/showProduct', 'ProductController@index')->name('product.showProduct');
	Route::get('/admin/showProduct/delete/{id}', 'ProductController@destroy')->name('product.delete');

	Route::get('/admin/showSupplier', 'SupplierController@index')->name('supplier.showSupplier');
	Route::get('/admin/showSupplier/delete/{id}', 'SupplierController@destroy')->name('supplier.destroy');

	Route::get('/admin/modifySubCatagory/{id}', 'SubCatagoryController@edit')->name('subcatagory.modifySubCatagory');
	Route::post('/admin/modifySubCatagory/{id}', 'SubCatagoryController@update');

	Route::get('/admin/modifyManufacturer/{id}', 'ManufacturerController@edit')->name('manufacturer.modifyManufacturer');
	Route::post('/admin/modifyManufacturer/{id}', 'ManufacturerController@update');

	Route::get('/admin/modifySupplier/{id}', 'SupplierController@edit')->name('supplier.modifySupplier');
	Route::post('/admin/modifySupplier/{id}', 'SupplierController@update');

	Route::get('/admin/modifyProduct/{id}', 'ProductController@edit')->name('product.modifyProduct');
	Route::post('/admin/modifyProduct/{id}', 'ProductController@update');

	Route::get('/admin/showProductDetails', 'ProductDetailsController@show')->name('prodet.showProdit');


	Route::get('/admin/showCatagory/{id}','CatagoryController@destroy')->name('catagory.destroy');

	Route::get('/admin/showProductDetails/{id}','ProductDetailsController@edit')->name('productdetails.show');
	Route::post('/admin/showProductDetails/{id}','ProductDetailsController@update');

	Route::get('/admin/showProductDetails/delete/{id}','ProductDetailsController@destroy')->name('productdetails.delete');

	Route::get('/admin/showProductDetail/search','eSearchController@index')->name('adminSearch1.show');

	Route::get('admin/search','eSearchController@action')->name('adminSearch1.action');
	
});


Route::group(['middleware'=>['csess']], function(){
	Route::post('/customer/product_details/{id}', 'ChartController@store');
	Route::get('/customer/chart', 'ChartController@show')->name('chart.list');
	Route::get('/customer/chart/delete/{id}', 'ChartController@destroy')->name('cart.delete');

	Route::get('/customer/chart', 'ChartController@show')->name('chart.list');
	
});




Route::get('/customer', 'CustomerController@index')->name('customer.index');

Route::get('/customer/product_details/{id}', 'CustomerController@buy')->name('customer.product_details');


Route::get('/customer/register', 'CustomerController@create')->name('customer.create');
Route::post('/customer/register', 'CustomerController@store');


Route::get('/customer/productlist/{id}', 'CustomerController@show')->name('products.view');




