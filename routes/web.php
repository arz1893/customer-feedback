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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company-login', 'Auth\CompanyLoginController@CompanyLogin')->name('company_login');
Route::post('/check-tenant', 'Auth\CompanyLoginController@CheckTenant')->name('check_tenant');

/* Master Data Routes */
Route::resource('master_data', 'MasterData\MasterDataController');
/* end of master data route */

/* Master Product Routes */
Route::resource('master_product', 'MasterData\MasterProductController');
Route::put('master_product/{MasterProduct}/change-picture', 'MasterData\MasterProductController@changePicture');
Route::post('master_product/delete-master-product', 'MasterData\MasterProductController@deleteProduct');
/* end of master product route */

/* Product Category Routes */
Route::resource('product_category', 'MasterData\ProductCategoryController');
Route::post('product_category/delete-category', 'MasterData\ProductCategoryController@deleteCategory');
Route::post('product_category/get-category', 'MasterData\ProductCategoryController@getProductCategory');
Route::post('product_category/update-category', 'MasterData\ProductCategoryController@updateProductCategory');
Route::post('product_category/get-childs', 'MasterData\ProductCategoryController@getChilds');
Route::post('product_category/get-roots', 'MasterData\ProductCategoryController@getRoots');
Route::post('product_category/get-trees', 'MasterData\ProductCategoryController@getTrees');
/* end of product category route */

/* Master Service Routes */
Route::resource('master_service', 'MasterData\MasterServiceController');
Route::post('master_service/delete-master-service', 'MasterData\MasterServiceController@deleteService');
/* end of master service route */

/* Faq Routes */
Route::resource('faq', 'Faq\FaqController');
/* end of Faq route */

/* FAQ Product Routes */
Route::get('faq/product/{id}', 'Faq\FaqProductController@productFaq')->name('product_faq');
Route::get('faq/product/add-faq/{id}', 'Faq\FaqProductController@addProductFaq')->name('add_product_faq');
Route::post('faq/product/{id}', 'Faq\FaqProductController@storeProductFaq')->name('save_product_faq');
Route::get('faq/product/edit/{id}', 'Faq\FaqProductController@editProductFaq')->name('edit_product_faq');
Route::patch('faq/product/update/{id}', 'Faq\FaqProductController@updateProductFaq')->name('update_product_faq');
Route::post('faq/product/delete/{id}', 'Faq\FaqProductController@deleteProductFaq')->name('delete_product_faq');
/* end of faq product route */

/* FAQ Service Routes */
Route::get('faq/service/{id}', 'Faq\FaqServiceController@serviceFaq')->name('service_faq');
Route::get('faq/service/add-faq/{id}', 'Faq\FaqServiceController@addServiceFaq')->name('add_service_faq');
Route::post('faq/service/{id}', 'Faq\FaqServiceController@storeServiceFaq')->name('save_service_faq');
Route::get('faq/service/edit/{id}', 'Faq\FaqServiceController@editServiceFaq')->name('edit_service_faq');
Route::patch('faq/service/update/{id}', 'Faq\FaqServiceController@updateServiceFaq')->name('update_service_faq');
Route::post('faq/service/delete/{id}', 'Faq\FaqServiceController@deleteServiceFaq')->name('delete_service_faq');
/* end of faq service route */

/* Complaint Routes */
Route::resource('complaint', 'Complaint\ComplaintController');
/* end of complaint routes */

/* Complaint Product Routes */
Route::get('complaint/product/{id}', 'Complaint\ComplaintProductController@addComplaintProduct')->name('add_complaint_product');
Route::get('complaint/complaint_product/{id}', 'Complaint\ComplaintProductController@complaintProduct')->name('complaint_product');
/* end of complaint product routes */

/* Question Routes */
Route::resource('question', 'Question\QuestionController');
/* end of question routes */

/* Customer Routes */
Route::resource('customer', 'Customer\CustomerController');
/* end of customer routes */