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

Route::get('/cache_clear',function(){
   Artisan::call('cache:clear');
});

Route::get('/view_clear',function(){
   Artisan::call('view:clear');
});
Route::get('/config_clear',function(){
   Artisan::call('config:cache');
});
Route::get('/route_clear',function(){
   Artisan::call('route:clear');
});

Route::get('/', 'FrontController@index')->name('home.index');
Route::get('/category/{category}', 'FrontController@indexCategory')->name('category.index');
Route::get('/categories/{category}', 'FrontController@viewAllCategories')->name('category.all.index');
Route::get('/product/{product}/details', 'FrontController@productDetails')->name('product.show');
Route::get('quote', 'FrontController@quoteIndex')->name('quote.index');
Route::post('quote', 'FrontController@quoteStore')->name('quote.store');
Route::get('contact', 'FrontController@contactIndex')->name('contact_us.index');
Route::post('contact', 'FrontController@contactStore')->name('contact_us.store');
Route::post('subscribers', 'FrontController@subscriberStore');
Route::get('blogs', 'FrontController@blogIndex')->name('blog.index');
Route::get('blog/{blog}/details', 'FrontController@blogShow')->name('blog.show');
Route::get('faq', 'FrontController@faqIndex')->name('faq.index');

Route::group(['prefix' => 'admin_panel'], function () {
	
	Route::get('/', 'Admin\AdminController@adminIndex')->middleware('admin');
	Route::get('/dashboard', 'Admin\AdminController@adminIndex')->name('admin.dashboard')->middleware('admin');

	Route::get('quotations', 'Admin\AdminController@quotationIndex')->name('admin.quotation.index')->middleware('admin');
	Route::get('quotation/{quotation}/details', 'Admin\AdminController@quotationShow')->name('admin.quotation.show')->middleware('admin');
	
	Route::get('/main_categories', 'Admin\MainCategoryController@index')->name('admin.main.category.index')->middleware('admin');
	Route::get('/main_category/create', 'Admin\MainCategoryController@create')->name('admin.main.category.create')->middleware('admin');
	Route::post('/main_category/store', 'Admin\MainCategoryController@store')->name('admin.main.category.store')->middleware('admin');
	Route::get('/main_category/{category}/edit', 'Admin\MainCategoryController@edit')->name('admin.main.category.edit')->middleware('admin');
	Route::put('/main_category/{category}', 'Admin\MainCategoryController@update')->name('admin.main.category.update')->middleware('admin');

	Route::get('/subcategories', 'Admin\CategoryController@index')->name('admin.subcategory.index')->middleware('admin');
	Route::get('/subcategory/create', 'Admin\CategoryController@create')->name('admin.subcategory.create')->middleware('admin');
	Route::post('/subcategory/store', 'Admin\CategoryController@store')->name('admin.subcategory.store')->middleware('admin');
	Route::get('/subcategory/{category}/edit', 'Admin\CategoryController@edit')->name('admin.subcategory.edit')->middleware('admin');
	Route::get('/subcategory/delete_image/{image}', 'Admin\CategoryController@deleteCategoryImage')->middleware('admin');
	Route::put('/subcategory/{category}', 'Admin\CategoryController@update')->name('admin.subcategory.update')->middleware('admin');

	Route::get('/products/industry', 'Admin\ProductController@indexIndustry')->name('admin.product.industry.index')->middleware('admin');
	Route::get('/products/styles', 'Admin\ProductController@indexStyles')->name('admin.product.styles.index')->middleware('admin');
	Route::get('/products/others', 'Admin\ProductController@indexOthers')->name('admin.product.others.index')->middleware('admin');
	Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create')->middleware('admin');
	Route::get('/getSubCategories/{category}', 'Admin\ProductController@getSubCategories')->middleware('admin');
	Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store')->middleware('admin');
	Route::get('/product/{product}/edit', 'Admin\ProductController@edit')->name('admin.product.edit')->middleware('admin');
	Route::get('/delete_image/{image}', 'Admin\ProductController@deleteProductImage')->middleware('admin');
	Route::put('/product/{product}', 'Admin\ProductController@update')->name('admin.product.update')->middleware('admin');

	Route::get('/blog_categories', 'Admin\BlogController@indexBlogCategory')->name('admin.blog_category.index')->middleware('admin');
	Route::get('/blog_category/create', 'Admin\BlogController@createBlogCategory')->name('admin.blog_category.create')->middleware('admin');
	Route::post('/blog_category/store', 'Admin\BlogController@storeBlogCategory')->name('admin.blog_category.store')->middleware('admin');
	Route::get('/blog_category/{category}/edit', 'Admin\BlogController@editBlogCategory')->name('admin.blog_category.edit')->middleware('admin');
	Route::put('/blog_category/{category}', 'Admin\BlogController@updateBlogCategory')->name('admin.blog_category.update')->middleware('admin');

	Route::get('/clients', 'Admin\AdminController@indexClients')->name('admin.clients.index')->middleware('admin');
	Route::get('/subscribers', 'Admin\AdminController@indexSubscribers')->name('admin.subscribers.index')->middleware('admin');

	Route::get('/blogs', 'Admin\BlogController@indexBlog')->name('admin.blog.index')->middleware('admin');
	Route::get('/blog/create', 'Admin\BlogController@createBlog')->name('admin.blog.create')->middleware('admin');
	Route::post('/blog/store', 'Admin\BlogController@storeBlog')->name('admin.blog.store')->middleware('admin');
	Route::get('/blog/{blog}/edit', 'Admin\BlogController@editBlog')->name('admin.blog.edit')->middleware('admin');
	Route::put('/blog/{blog}', 'Admin\BlogController@updateBlog')->name('admin.blog.update')->middleware('admin');

	Route::post('ckeditor/blog/image_upload', 'Admin\BlogController@upload')->name('admin.upload.ckeditor')->middleware('admin');

	Route::get('contacts', 'Admin\AdminController@indexContact')->name('admin.contact.index')->middleware('admin');
	Route::put('contact/{id}', 'Admin\AdminController@updateContact')->name('admin.contact.update')->middleware('admin');

	Route::get('social_media', 'Admin\AdminController@indexSocialMedia')->name('admin.social_media.index')->middleware('admin');
	Route::put('social_media/{id}', 'Admin\AdminController@updateSocialMedia')->name('admin.social_media.update')->middleware('admin');

	Route::get('banner', 'Admin\AdminController@indexBanner')->name('admin.banner.index')->middleware('admin');
	Route::put('banner/{id}', 'Admin\AdminController@updateBanner')->name('admin.banner.update')->middleware('admin');

	Route::get('faqs', 'Admin\AdminController@indexFaqs')->name('admin.faqs.index')->middleware('admin');
	Route::get('faqs/create', 'Admin\AdminController@createFaqs')->name('admin.faqs.create')->middleware('admin');
	Route::post('faqs', 'Admin\AdminController@storeFaqs')->name('admin.faqs.store')->middleware('admin');
	Route::get('faqs/{id}/edit', 'Admin\AdminController@editFaqs')->name('admin.faqs.edit')->middleware('admin');
	Route::put('faqs/{id}', 'Admin\AdminController@updateFaqs')->name('admin.faqs.update')->middleware('admin');
	Route::get('faqs/{id}/delete', 'Admin\AdminController@destroyFaq')->name('admin.faqs.delete')->middleware('admin');

	Route::get('emails', 'Admin\AdminController@indexEmail')->name('admin.email.index')->middleware('admin');
	Route::put('emails/{id}', 'Admin\AdminController@updateEmail')->name('admin.email.update')->middleware('admin');

	Route::get('messages', 'Admin\AdminController@messagesIndex')->name('admin.message.index')->middleware('admin');
	Route::get('message/{message}/details', 'Admin\AdminController@messageShow')->name('admin.message.show')->middleware('admin');

	Route::get('administrators', 'Admin\AdminController@administratorsIndex')->name('admin.administrators.index')->middleware('admin');
	Route::get('administrator/create', 'Admin\AdminController@administratorsCreate')->name('admin.administrators.create')->middleware('admin');
	Route::post('administrator/store', 'Admin\AdminController@administratorsStore')->name('admin.administrators.store')->middleware('admin');
	Route::get('administrator/{administrator}', 'Admin\AdminController@administratorsEdit')->name('admin.administrators.edit')->middleware('admin');
	Route::put('administrator/{administrator}', 'Admin\AdminController@administratorsUpdate')->name('admin.administrators.update')->middleware('admin');

	Route::get('password', 'Admin\AdminController@indexPassword')->name('admin.password.index')->middleware('admin');
    Route::put('password/{admin}/change', 'Admin\AdminController@changePassword')->name('admin.password.update')->middleware('admin');

	Route::get('/login', 'Admin\AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'Admin\AdminAuth\LoginController@login')->name('admin.login.store');
    Route::post('/logout', 'Admin\AdminAuth\LoginController@logout')->name('admin.logout');

});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::put('/shipping_address/{id}', 'HomeController@updateShippingAddress')->name('shipping_address.update');
Route::put('/billing_address/{id}', 'HomeController@updateBillingAddress')->name('billing_address.update');
Route::put('/profile/{id}', 'HomeController@updateProfile')->name('profile.update');
Route::put('password/{id}/change', 'HomeController@changePassword')->name('password.update');
