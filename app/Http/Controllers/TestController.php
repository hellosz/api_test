<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * 创建 Adlink
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
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

    /**
     * 佣金提现
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function commission(Request $request)
    {
        /**
         * {
        "id": 10000,
        "commisssion": "50",
        "payType": 1,
        "payinfo": {
        "bankAccount": "44565465566"
        }
        }
         *
         */
        $params = $request->all();
        $response = [
            'status' => 200,
            'msg' => '请求成功',
            'data' => [
                'params' => $params
            ]
        ];

        return response()->json($response);
    }
}
