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

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
    Route::get('user-list', 'UserController@getUserList');

    /* Chat urls */
    Route::post('get-user-conversation', 'ChatController@getUserConversationById');
    Route::post('save-chat', 'ChatController@saveUserChat');

    /* Private message */
    Route::post('get-private-message-notification', 'PrivateMessageController@getUserNotification');
    Route::post('get-private-messages', 'PrivateMessageController@getPrivateMessages');
    Route::post('get-private-message', 'PrivateMessageController@getPrivateMessageById');
    Route::post('get-private-message-sent', 'PrivateMessageController@getPrivateMessageSent');
    Route::post('sent-private-message', 'PrivateMessageController@sendPrivateMessage');
});
