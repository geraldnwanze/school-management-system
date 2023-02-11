<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($msg, $statusCode, $response)
    {
        $data = [];
        $data['msg'] = $msg;
        $data['statusCode'] = $statusCode;
        $data['data'] = $response;
        return $data;
    }

    public function failureResponse($msg, $statusCode, $response)
    {
        $data = [];
        $data['msg'] = $msg;
        $data['statusCode'] = $statusCode;
        $data['data'] = $response;
        return $data;
    }

}
