<?php
// These routes are for example in local:

Route::view('login', 'lte::auth.login')->name('login');

Route::get('/', 'ExampleController@home')->name('home');
Route::view('fields', 'lte::content.fields')->name('fields');
Route::view('blank', 'lte::content.blank')->name('blank');
Route::view('account', 'lte::account.edit')->name('account.edit');

Route::view('pages', 'lte::nodes.pages.index')->name('pages.index');
Route::view('pages/edit', 'lte::nodes.pages.edit')->name('pages.edit');
Route::view('pages/create', 'lte::nodes.pages.create')->name('pages.create');

Route::view('users', 'lte::nodes.users.index')->name('users.index');
Route::view('users/edit', 'lte::nodes.users.edit')->name('users.edit');
Route::view('users/create', 'lte::nodes.users.create')->name('users.create');

Route::get('data/statuses', 'ExampleController@statuses')->name('data.statuses');
Route::get('data/treeselect', 'ExampleController@treeselect')->name('data.treeselect');
Route::get('data/treeview', 'ExampleController@treeview')->name('data.treeview');