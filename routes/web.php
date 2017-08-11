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

use App\Events\UserSignedUp;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    // 1. Publish event with Redis
    // 2. Node.js + Redis subscribes to event
    // 3. Use socket.io to emit to all clients

//    Redis::set('name', 'Keodina');
//    return Redis::get('name');
//    return view('welcome');
//    $data = [
//        'event' => 'UserSignedUp',
//        'data' => [
//            'username' => 'cheykeodina'
//        ]
//    ];
//    Redis::publish('test-channel', json_encode($data));
    event(new UserSignedUp('cheykeodina'));
    return view('welcome');
});

Route::get('/call', function () {
    return view('call');
});

Route::post('/post-call', 'PostCallController@makeCall');
