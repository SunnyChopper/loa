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

// Testing
Route::get('/test/payment', 'PagesController@test_payment');
Route::post('/test/payment/create', 'PagesController@test_payment_charge');

// Public site
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/free-tools', 'PagesController@tools');
Route::get('/free-advice', 'PagesController@blog');
Route::get('/posts/{post_id}/{slug}', 'PagesController@view_post');
Route::get('/shop', 'PagesController@shop');
Route::get('/product/{product_id}', 'PagesController@product');
Route::get('/courses', 'PagesController@courses');
Route::get('/events', 'PagesController@events');
Route::get('/members/login', 'PagesController@login');
Route::get('/members/register', 'PagesController@register');
Route::get('/members/logout', 'UsersController@logout');
Route::post('/contact/submit', 'PagesController@submit_contact');

// Cart functions
Route::post('/cart/add', 'CartController@add_to_cart');
Route::get('/cart/delete/all', 'CartController@delete_all_from_cart');
Route::post('/cart/delete/product', 'CartController@delete_from_cart');
Route::post('/cart/checkout', 'CartController@checkout');

// E-commerce
Route::get('/cart', 'PagesController@cart');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/thank-you', 'PagesController@thank_you');

// Admin site
Route::get('/admin', 'AdminController@index');
Route::get('/admin/switch', 'AdminController@switch');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/products/view', 'AdminController@view_products');
Route::get('/admin/products/new', 'AdminController@new_product');
Route::get('/admin/products/edit/{product_id}', 'AdminController@edit_product');
Route::get('/admin/products/stats', 'AdminController@view_product_stats');
Route::get('/admin/orders/view', 'AdminController@view_orders');
Route::get('/admin/orders/edit/{order_id}', 'AdminController@edit_order');
Route::get('/admin/posts/view', 'AdminController@view_blog_posts');
Route::get('/admin/posts/new', 'AdminController@new_blog_post');
Route::get('/admin/posts/edit/{post_id}', 'AdminController@edit_blog_post');
Route::get('/admin/posts/stats', 'AdminController@blog_post_stats');

// Product functions
Route::post('/admin/products/delete', 'ProductsController@delete');

// Order functions
Route::post('/admin/orders/update', 'OrdersController@update_order');
Route::get('/admin/orders/full/{order_id}', 'OrdersController@get_order');

// Blog post functions
Route::post('/admin/posts/create', 'PostsController@create');
Route::post('/admin/posts/create/draft', 'PostsController@save_draft');
Route::post('/admin/posts/update', 'PostsController@update');
Route::post('/admin/posts/delete', 'PostsController@delete');

// Private site
Route::get('/members/dashboard/', 'DashboardController@index');
Route::get('/members/tools/', 'DashboardController@tools');
Route::get('/members/community', 'DashboardController@community');
Route::get('/members/courses', 'DashboardController@courses');
Route::get('/members/shop', 'DashboardController@shop');
Route::get('/members/settings', 'DashboardController@settings');

Auth::routes();
