<?php

namespace App\Traits;

trait ApiResponse
{

    public function successResponse($data, $code = 200, $msg = ''){
        return response()->json(array('data' => $data, 'code' => $code, 'msg' => $msg), $code);
    }

    public function errorResponse($data, $code = 500, $msg = ''){
        return response()->json(array('data' => $data, 'code' => $code, 'msg' => $msg), $code);
    }

}