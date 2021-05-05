<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\category;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login','UserController@getAdminLogin');
Route::post('/admin/login','UserController@postAdminLogin');
Route::get('/admin/logout','UserController@getAdminLogout');
Route::get('/admin/statistic', 'PostController@getStatistic' )->middleware('adminLogin');
Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'], function(){
    //admin/category/list
    Route::group(['prefix'=>'category'], function(){
        Route::get('list', 'CategoryController@getList');
        Route::get('edit/{id}', 'CategoryController@getEdit');
        Route::post('edit/{id}', 'CategoryController@postEdit');
        Route::get('add', 'CategoryController@getAdd');
        Route::post('add', 'CategoryController@postAdd');
        Route::get('delete/{id}', 'CategoryController@getDelete');
    });

    Route::group(['prefix'=>'post'], function(){
        Route::get('list', 'PostController@getList');
        Route::get('edit/{id}', 'PostController@getEdit');
        Route::post('edit/{id}', 'PostController@postEdit');
        Route::get('add', 'PostController@getAdd');
        Route::post('add', 'PostController@postAdd');
        Route::get('delete/{id}', 'PostController@getDelete');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('list', 'UserController@getList');
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');
        Route::get('delete/{id}', 'UserController@getDelete');
    });

    Route::group(['prefix'=>'pendinguser'], function(){
        Route::get('list', 'PendingUserController@getList');
        Route::get('accept/{id}', 'PendingUserController@getAccept');
        Route::get('delete/{id}', 'PendingUserController@getDelete');
        Route::get('recover/{id}', 'PendingUserController@getRecover');
        Route::get('refuse/{id}', 'PendingUserController@getRefuse');
    });
    Route::group(['prefix'=>'pendingpost'], function(){
        Route::get('list', 'PendingPostController@getList');
        Route::get('accept/{id}', 'PendingPostController@getAccept');
        Route::get('delete/{id}', 'PendingPostController@getDelete');
        Route::get('recover/{id}', 'PendingPostController@getRecover');
        Route::get('refuse/{id}', 'PendingPostController@getRefuse');
    });

    Route::group(['prefix'=>'comment'], function(){
        Route::get('delete/{id}/{post_id}', 'CommentController@getDelete');
        
    });

});
Route::get('index', 'PageController@index');
Route::get('detail/{id}', 'PageController@detail');
//Auth
Route::get('login','LoginController@getlogin');
Route::post('login','LoginController@postlogin');
Route::get('logout', 'LoginController@getlogout');
Route::get('register', 'LoginController@getregister');
Route::post('register', 'LoginController@postregister');

Route::get('profile/{id}', 'PageController@getprofile');
Route::get('comment', 'CommentController@postComment');
Route::get('filter', 'PageController@getFilter');
Route::get('getResult', 'PageController@getResult');
Route::get('cat/{id}', 'PageController@getHeader');
//Middeware check for pages must login to access
Route::get('editpost/{id}', 'PageController@getEditPost')->middleware('usercheck');
Route::get('editprofile', 'PageController@getEdit')->middleware('logincheck');
Route::post('editprofile', 'PageController@postEditUser')->middleware('logincheck');
Route::post('editpost/{id}', 'PageController@postEditPost')->middleware('usercheck');
Route::get('post','PageController@getpost')->middleware('logincheck');
Route::post('post', 'PageController@postPost' )->middleware('logincheck');
Route::get('report/{id}','PageController@getReport')->middleware('logincheck');
Route::post('report/{id}', 'ReportController@postReport')->middleware('logincheck');
Route::get('addFavor','PageController@getAddFavor')->middleware('logincheck');
Route::get('notify', 'PageController@getNotify')->middleware('logincheck');
Route::get('savepost', 'PageController@getSavePost')->middleware('logincheck');
Route::get('postlist', 'PageController@getPostList')->middleware('logincheck');

Route::get('deletepost','PageController@getDeletepost');
Route::get('news', 'PageController@getNews');
Route::get('empty', 'PostController@empty');