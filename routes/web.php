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

/**
 * Router All Fontend
 */
Auth::routes();

Route::group(['namespace' => 'Fontend', 'as' => 'blog.' ], function (){
    Route::get('/', 'BlogController@index')->name('home');
    Route::get('the-loai-{slug_category}', 'BlogController@getListArticleOfCategory')->name('list-article-of-category');
    Route::get('the-loai-{slug_category}/{slug_article}', 'BlogController@detailArticle')->name('detail-article');
});

/**
 * Router All Backend
 */
Route::group(['prefix' => 'backend', 'namespace' => 'Backend','as' => 'backend.'], function (){

    // Auth
    Route::get('login','AuthController@showLoginForm')->name('login');
    Route::post('login','AuthController@login');
    Route::get('logout','AuthController@logout')->name('logout');

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // User
    Route::resource('user','UserController');

    // Role
    Route::get('role/attachPerms/{role}','RoleController@attachPerms')->name('role.attachPerms');
    Route::post('role/postAttachPerms/{role}','RoleController@postAttachPerms')->name('role.postAttachPerms');
    Route::resource('role','RoleController');

    // Permission
    Route::resource('permission','PermissionController');

    //Group Category
    Route::post('category/changeStatus/{category}','CategoryController@changeStatus')->name('category.changeStatus');;
    Route::resource('category', 'CategoryController', ['middleware' => ['create' => 'permission:create-category', 'index' => 'permission:browse-category']]);

    // Group Article
    Route::post('article/changeStatus/{category}','ArticleController@changeStatus')->name('article.changeStatus');;
    Route::resource('article','ArticleController');

});


