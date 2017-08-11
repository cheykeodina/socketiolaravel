<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class PostCallController extends Controller
{
    public function makeCall(Request $request)
    {
        Log::info($request);
        $data = [
            'event' => 'UserSignedUp',
            'data' => [
                'status' => 'true'
            ]
        ];
        Redis::publish('test-channel', json_encode($data));
    }
}
