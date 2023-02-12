<?php
// These routes are for example in local:

Route::view('login', 'lte::auth.login')->name('login');
Route::view('login', 'lte::auth.login')->name('login');
Route::view('login/2fa', 'lte::auth.two-factor-challenge')->name('login.2fa');
Route::view('confirm-password', 'lte::auth.confirm-password')->name('confirm-password');

Route::get('/', 'ExampleController@home')->name('home');
Route::view('fields', 'lte::examples.fields')->name('fields');
Route::view('skin', 'lte::examples.skin')->name('fields');
Route::view('blank', 'lte::examples.blank')->name('blank');

Route::get('data/statuses', 'ExampleController@statuses')->name('data.statuses');
Route::get('data/modal-content', 'ExampleController@modalContent')->name('data.modal-content');
Route::post('data/statuses', 'ExampleController@status')->name('data.status');
Route::get('data/treeselect', 'ExampleController@treeselect')->name('data.treeselect');
Route::get('data/treeview', 'ExampleController@treeview')->name('data.treeview');
Route::get('data/tags', 'ExampleController@tags')->name('data.tags');
