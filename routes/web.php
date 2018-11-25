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
Route::get('/server-info', function() {
	$tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
	echo ini_get('upload_tmp_dir');
});

// Public site
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/free-tools', 'PagesController@tools');
Route::get('/free-advice', 'PagesController@blog');
Route::get('/posts/{post_id}/{slug}', 'PagesController@view_post');
Route::get('/shop', 'PagesController@shop');
Route::get('/product/{product_id}', 'PagesController@product');
Route::get('/courses', 'PagesController@courses');
Route::get('/courses/view/{course_id}', 'PagesController@view_course');
Route::get('/events', 'PagesController@events');
Route::get('/members/login', 'PagesController@login');
Route::get('/members/register', 'PagesController@register');
Route::get('/members/logout', 'UsersController@logout');
Route::post('/contact/submit', 'PagesController@submit_contact');
Route::get('/contact/success', 'PagesController@thank_you_post_contact');
Route::get('/events/thank-you', 'PagesController@thank_you_post_rsvp');

// Cart functions
Route::post('/cart/add', 'CartController@add_to_cart');
Route::get('/cart/delete/all', 'CartController@delete_all_from_cart');
Route::post('/cart/delete/product', 'CartController@delete_from_cart');
Route::post('/cart/checkout', 'CartController@checkout');
Route::post('/promo/attach', 'CartController@attach_promo_code');
Route::post('/promo/delete', 'CartController@remove_promo_code');

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
Route::get('/admin/users/view', 'AdminController@view_users');
Route::get('/admin/users/new', 'AdminController@new_user');
Route::get('/admin/users/id/{user_id}', 'UsersController@get_user_info');
Route::get('/admin/events/view', 'AdminController@view_events');
Route::get('/admin/events/edit/{event_id}', 'AdminController@edit_event');
Route::get('/admin/events/new', 'AdminController@new_event');
Route::get('/admin/events/stats', 'AdminController@event_stats');
Route::get('/admin/courses/view', 'AdminController@view_courses');
Route::get('/admin/courses/new', 'AdminController@new_course');
Route::get('/admin/courses/edit/{course_id}', 'AdminController@edit_course');
Route::get('/admin/courses/stats', 'AdminController@course_stats');
Route::get('/admin/discussions/view', 'AdminController@view_book_discussions');
Route::get('/admin/discussions/new', 'AdminController@new_book_discussion');
Route::get('/admin/promo/view', 'AdminController@view_promo_codes');
Route::get('/admin/promo/new', 'AdminController@new_promo_code');
Route::get('/admin/promo/edit/{promo_code_id}', 'AdminController@edit_promo_code');
Route::get('/admin/promo/stats', 'AdminController@view_promo_stats');
Route::get('/admin/voting/view', 'AdminController@view_voting_polls');
Route::get('/admin/voting/new', 'AdminController@new_voting_poll');

// Order functions
Route::post('/admin/discussions/create', 'BookDiscussionController@create');

// Book discussion functions
Route::post('/discussion/post/create', 'BookDiscussionController@create_post');

// Promo code functions
Route::post('/admin/promo/create', 'PromoCodesController@create');
Route::post('/admin/promo/delete', 'PromoCodesController@delete');
Route::post('/admin/promo/update', 'PromoCodesController@update');

// Voting functions
Route::post('/vote/create', 'VotingController@create_vote');
Route::post('/poll/create', 'VotingController@create_voting_poll');
Route::post('/poll/delete', 'VotingController@delete_voting_poll');

// User functions
Route::post('/admin/users/create', 'UsersController@create_user');
Route::post('/admin/users/edit', 'UsersController@edit_user');

// Course functions
Route::post('/admin/courses/create', 'CoursesController@create');
Route::post('/admin/courses/update', 'CoursesController@update');

// Event functions
Route::get('/events/signups/{event_id}', 'EventSignupsController@get_event_signups');
Route::post('/admin/events/update', 'EventsController@update_event');
Route::post('/admin/events/create', 'EventsController@create_event');
Route::post('/admin/events/delete', 'EventsController@delete_event');
Route::post('/admin/events/rsvp', 'EventSignupsController@create');

// Product functions
Route::post('/admin/products/delete', 'ProductsController@delete');
Route::post('/admin/products/create', 'ProductsController@add_product');
Route::post('/admin/products/update', 'ProductsController@edit_product');

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
Route::get('/members/profile', 'DashboardController@profile');
Route::get('/discussion/{book_discussion_id}', 'DashboardController@view_book_discussion');

Auth::routes();
