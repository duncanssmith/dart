<?php

# Secure page
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

// Home and public pages
Route::get('/', ['as' => 'public',  'uses' => 'PagesController@home']);
Route::get('/page/{id}', ['as' => 'public',  'uses' => 'PagesController@pagegroup']);
Route::get('/pagework/{id}', ['as' => 'public',  'uses' => 'PagesController@pagework']);
Route::get('/pagetexts', ['as' => 'pagetexts',  'uses' => 'PagesController@pagetexts']);
Route::get('/pagetext/{id}', ['as' => 'pagetext',  'uses' => 'PagesController@pagetext']);

// Assign items to Groups
Route::get('/assign_work/{id}', ['as' => 'assign_work',  'uses' => 'GroupController@assign_work']);
Route::post('/save_assigned_work', ['as' => 'save_assigned_work',  'uses' => 'GroupController@save_assigned_work']);
Route::get('/assign_text/{id}', ['as' => 'assign_text',  'uses' => 'GroupController@assign_text']);
Route::post('/save_assigned_text', ['as' => 'save_assigned_text',  'uses' => 'GroupController@save_assigned_text']);

// Set cover
Route::get('/set_cover/{id}', ['as' => 'set_cover',  'uses' => 'CoverController@set_cover']);
Route::post('/save_set_cover', ['as' => 'save_set_cover',  'uses' => 'CoverController@save_set_cover']);

# Ordering items in Groups
Route::get('/sort_page_works/{id}', ['as' => 'sort_page_works',  'uses' => 'GroupController@sort_page_works']);
Route::get('/sort_page_texts/{id}', ['as' => 'sort_page_texts',  'uses' => 'GroupController@sort_page_texts']);

# Ajax routes to save orders
Route::post('/save_page_works_order', ['as' => 'save_page_works_order',  'uses' => 'GroupController@save_page_works_order']);
Route::post('/save_page_texts_order', ['as' => 'save_page_texts_order',  'uses' => 'GroupController@save_page_texts_order']);

# Registration COMMENTED FOR PRODUCTION
//Route::get('/register', 'RegistrationController@create')->before('guest');
//Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
// COMMENTED FOR PRODUCTION
//Route::controller('password', 'RemindersController');

// CRUD
// CRUD
Route::resource('works', 'WorkController');
Route::resource('navigations', 'NavigationController');
Route::resource('pages', 'GroupController');
Route::resource('texts', 'TextController');
Route::resource('covers', 'CoverController');

// COMMENTED FOR PRODUCTION
Route::resource('users', 'UserController');
//Route::get('users', ['as' => 'home', 'uses' => 'PagesController@home']);

//Route::get('profile', array('before' => 'auth.basic', function()
//{
//    // Only authenticated users may enter...
//}));
//
//Route::filter('auth.basic', function()
//{
//    return Auth::basic('username');
//});
