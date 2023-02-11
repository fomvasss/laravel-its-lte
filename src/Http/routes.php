<?php
// These routes are for example in local:

Route::view('login', 'lte::auth.login')->name('login');
Route::view('login', 'lte::auth.login')->name('login');
Route::view('login/2fa', 'lte::auth.two-factor-challenge')->name('login.2fa');
Route::view('confirm-password', 'lte::auth.confirm-password')->name('confirm-password');

Route::get('/', 'ExampleController@home')->name('home');
Route::view('fields', 'lte::content.fields')->name('fields');
Route::view('blank', 'lte::content.blank')->name('blank');
Route::view('profile', 'lte::profile.edit')->name('profile.edit');

Route::view('settings/logs', 'lte::settings.logs');
Route::view('settings/tinker', 'lte::settings.tinker');
Route::view('settings/lte', 'lte::settings.lte');
Route::view('settings/vars', 'lte::settings.vars');
Route::view('settings/tabs/{tab?}', 'lte::settings.tabs')->name('settings.tabs');

Route::view('pages', 'lte::content.pages.index')->name('pages.index');
Route::view('pages/edit', 'lte::content.pages.edit')->name('pages.edit');
Route::view('pages/create', 'lte::content.pages.create')->name('pages.create');

Route::view('users', 'lte::content.users.index')->name('users.index');
Route::view('users/edit', 'lte::content.users.edit')->name('users.edit');
Route::view('users/create', 'lte::content.users.create')->name('users.create');

Route::get('data/statuses', 'ExampleController@statuses')->name('data.statuses');
Route::get('data/modal-content', 'ExampleController@modalContent')->name('data.modal-content');
Route::post('data/statuses', 'ExampleController@status')->name('data.status');
Route::get('data/treeselect', 'ExampleController@treeselect')->name('data.treeselect');
Route::get('data/treeview', 'ExampleController@treeview')->name('data.treeview');
Route::get('data/tags', 'ExampleController@tags')->name('data.tags');
