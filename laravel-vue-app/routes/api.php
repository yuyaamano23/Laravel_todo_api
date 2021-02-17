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

Route::group(['middleware' => ['api', 'cors']], function(){
    Route::options('todos', function() {
        return response()->json();
    });
    Route::apiResource('todos', 'TodoController');
    // ↓このようにひとつづつ丁寧に書いても良い
    // Route::get('todos', 'TodoController@index');
    // なんならこれもあり
    Route::apiResource('comments', 'commentController');



    // 検索機能APIのルーティング
    Route::get('todo/search', 'TodoSearchController@index')->name('todos.search');
    // コメント機能のルーティング apiReourceで書いてみました
    // Route::post('todo/comment/post', 'CommentController@store')->name('todos.comment.store');
    // Route::get('todo/comment/get', 'CommentController@show')->name('todos.comment.show');
    // Route::delete('todo/comment/delete', 'CommentController@destroy')->name('todos.comment.destroy');
});
