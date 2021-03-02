<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    $message = 'Hello World!!';

    return response()->json([
        'message' => $message
    ]);
});

Route::group(['middleware' => ['api', 'cors']], function () {
    Route::post('register', 'Auth\RegisterController@store');
    Route::post('login', 'Auth\LoginController@login');
    // 認証が必要なapi
    Route::group(['middleware' => 'auth:api'], function () {
        // ユーザ情報取得
        Route::get('me', 'UserController@me');
    });
    // todo関連
    Route::apiResource('todos', 'TodoController');
    // 検索機能API
    Route::get('todo/search', 'TodoSearchController@index')->name('todos.search');
    // コメント関連
    Route::apiResource('comments', 'commentController');
    Route::options('todos', function () {
        return response()->json();
    });
    // ↓このようにひとつづつ丁寧に書いても良い
    // Route::post('todo/comment/post', 'CommentController@store')->name('todos.comment.store');
    // Route::get('todo/comment/get', 'CommentController@show')->name('todos.comment.show');
    // Route::delete('todo/comment/delete', 'CommentController@destroy')->name('todos.comment.destroy');
});
