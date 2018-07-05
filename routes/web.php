<?php

/**
 *  Login routes
 */
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login/in', ['as' => 'login.in', 'uses' => 'LoginController@in']);
Route::get('/login/out', ['as' => 'login.out', 'uses' => 'LoginController@out']);

/**
 * Protect routes from unauthenticated access
 */

Route::group(['middleware' => 'auth'], function () {
    /**
     *  Main routes
     */
    Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);
    Route::get('notfound', ['as' => 'notfound', 'uses' => 'MainController@notfound']);
    Route::get('about', ['as' => 'about', 'uses' => 'MainController@about']);

    /**
     * General routes
     */
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);

    /**
     * Person routes
     */
    Route::get('/person/manage/natural', ['as' => 'person.manage.natural', 'uses' => 'PersonController@manage_natural']);
    Route::get('/person/manage/legal', ['as' => 'person.manage.legal', 'uses' => 'PersonController@manage_legal']);
    Route::get('/person/new', ['as' => 'person.new', 'uses' => 'PersonController@new']);
    Route::get('/person/edit/{person_type}/{person_id}', ['as' => 'person.edit', 'uses' => 'PersonController@edit']);
    Route::post('/person/create', ['as' => 'person.create', 'uses' => 'PersonController@create']);
    Route::get('/person/delete/{person_type}/{person_id}', ['as' => 'person.delete', 'uses' => 'PersonController@delete']);
    Route::post('/person/update/{person_type}/{person_id}', ['as' => 'person.update', 'uses' => 'PersonController@update']);

    /**
     * Settings routes
     */
    Route::get('/settings/profile/{user_id}', ['as' => 'settings.profile', 'uses' => 'SettingsController@profile']);
    Route::get('/settings/users', ['as' => 'settings.user', 'uses' => 'SettingsController@users']);
    Route::get('/settings/preferences', ['as' => 'settings.preferences', 'uses' => 'SettingsController@preferences']);
});

