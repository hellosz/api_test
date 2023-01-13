<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createAdlink(Request $request)
    {
        // TODO 参数校验
        
        $response = [
            'status' => 200,
            'msg' => '请求成功',
            'data' => [
                'adlinkId' => (string)random_int(1000000, 9999999)
            ]
        ];

        return response()->json($response);
    }
}
