<?php
// These routes are for example in local:

Route::view('login', 'lte::auth.login')->name('login');

Route::view('/', 'lte::content.home')->name('home');
Route::view('fields', 'lte::content.fields')->name('fields');
Route::view('account', 'lte::content.account.edit')->name('account.edit');
Route::view('blank', 'lte::content.blank')->name('blank');

Route::view('pages', 'lte::content.pages.index')->name('pages.index');
Route::view('pages/edit', 'lte::content.pages.edit')->name('pages.edit');
Route::view('pages/create', 'lte::content.pages.create')->name('pages.create');

Route::view('users', 'lte::content.users.index')->name('users.index');
Route::view('users/edit', 'lte::content.users.edit')->name('users.edit');
Route::view('users/create', 'lte::content.users.create')->name('users.create');

Route::get('data/statuses', 'ExampleController@statuses')->name('data.statuses');
Route::get('data/treeselect', 'ExampleController@treeselect')->name('data.treeselect');
Route::get('data/treeview', 'ExampleController@treeview')->name('data.treeview');