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

/* User Management Route */
Route::resource('user', 'Auth\UserController');
Route::post('user/delete-user', 'Auth\UserController@deleteUser');
/* end of user management route */

/* Master Data Routes */
Route::resource('master_data', 'MasterData\MasterDataController');
/* end of master data route */

/* Master Product Routes */
Route::resource('master_product', 'MasterData\MasterProductController');
Route::put('master_product/{MasterProduct}/change-picture', 'MasterData\MasterProductController@changePicture');
Route::post('master_product/delete-master-product', 'MasterData\MasterProductController@deleteProduct');
/* end of master product route */

/* Product Category Routes */
Route::post('product_category/get-category', 'MasterData\ProductCategoryController@getProductCategory');
Route::post('product_category/update-category', 'MasterData\ProductCategoryController@updateProductCategory');
Route::post('product_category/get-childs', 'MasterData\ProductCategoryController@getChilds');
Route::post('product_category/get-trees', 'MasterData\ProductCategoryController@getTrees');
Route::post('product_category/get-category', 'MasterData\ProductCategoryController@getCategory');
Route::post('product_category/add-child-node', 'MasterData\ProductCategoryController@addChildNode');
Route::post('product_category/rename-node', 'MasterData\ProductCategoryController@renameNode');
Route::post('product_category/delete-node', 'MasterData\ProductCategoryController@removeNode');
Route::post('product_category/delete-product-category', 'MasterData\ProductCategoryController@deleteProductCategory');
Route::resource('product_category', 'MasterData\ProductCategoryController');
/* end of product category route */

/* Master Service Routes */
Route::resource('master_service', 'MasterData\MasterServiceController');
Route::post('master_service/delete-master-service', 'MasterData\MasterServiceController@deleteService');
/* end of master service route */

/* Service Category Routes */
Route::post('service_category/get-trees', 'MasterData\ServiceCategoryController@getTrees');
Route::post('service_category/get-childs', 'MasterData\ServiceCategoryController@getChilds');
Route::post('service_category/get-category', 'MasterData\ServiceCategoryController@getCategory');
Route::post('service_category/rename-category', 'MasterData\ServiceCategoryController@renameServiceCategory');
Route::post('service_category/delete-category', 'MasterData\ServiceCategoryController@deleteServiceCategory');
Route::post('service_category/add-child-node', 'MasterData\ServiceCategoryController@addChildNode');
Route::post('service_category/rename-node', 'MasterData\ServiceCategoryController@renameNode');
Route::post('service_category/delete-node', 'MasterData\ServiceCategoryController@deleteNode');
Route::resource('service_category', 'MasterData\ServiceCategoryController');
/* end of service category route */

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
Route::get('complaint/complaint-product/edit-complaint-product/{ComplaintProduct}', 'Complaint\ComplaintProductController@editComplaintProduct')->name('edit_complaint_product');
Route::get('complaint/complaint-product/{MasterProduct}/{CurrentNodeId}', 'Complaint\ComplaintProductController@complaintProduct')->name('complaint_product');
Route::post('complaint/complaint-product/add-complaint-product', 'Complaint\ComplaintProductController@addComplaintProduct')->name('add_complaint_product');
Route::post('complaint/complaint-product/delete-complaint-product', 'Complaint\ComplaintProductController@deleteComplaintProduct')->name('delete_complaint_product');
Route::put('complaint/complaint-product/update-complaint-product/{ComplaintProduct}', 'Complaint\ComplaintProductController@updateComplaintProduct')->name('update_complaint_product');
/* end of complaint product routes */

/* Complaint Product List Routes */
Route::resource('complaint_list_product', 'Complaint\ComplaintListProductController');
//Route::get('complaint_list_product/edit/{id}', 'Complaint\ComplaintListProductController@editComplaint')->name('edit_complaint_list_product');
//Route::put('complaint_list_product/update/{id}', 'Complaint\ComplaintListProductController@updateComplaint')->name('update_complaint_list_product');
/* end of complaint service list routes */

/* Complaint Service List Routes */
Route::post('complaint_list_service/delete-complaint-service', 'Complaint\ComplaintListServiceController@deleteComplaintService');
Route::resource('complaint_list_service', 'Complaint\ComplaintListServiceController');
/* end of complaint service list routes */

/* Complaint Service Routes */
Route::get('complaint/complaint-service/edit-complaint-service/{ComplaintService}', 'Complaint\ComplaintServiceController@editComplaintService')->name('edit_complaint_service');
Route::get('complaint/complaint-service/{MasterService}/{CurrentNodeId}', 'Complaint\ComplaintServiceController@complaintService')->name('complaint_service');
Route::post('complaint/complaint-service/add-complaint-service', 'Complaint\ComplaintServiceController@addComplaintService')->name('add_complaint_service');
Route::put('complaint/complaint-service/update-complaint-service/{ComplaintService}', 'Complaint\ComplaintServiceController@updateComplaintService')->name('update_complaint_service');
Route::post('complaint/complaint-service/delete-complaint-service', 'Complaint\ComplaintServiceController@deleteComplaintService')->name('delete_complaint_service');
/* end of complaint service routes */

/* Question Routes */
Route::resource('question', 'Question\QuestionController');
/* end of question routes */

/* Customer Routes */
Route::resource('customer', 'Customer\CustomerController');
/* end of customer routes */