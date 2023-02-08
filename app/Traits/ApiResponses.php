<?php

namespace App\Traits;

trait ApiResponses
{
    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Request was successful',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error($message = null, $code)
    {
        return response()->json([
            'status' => 'Something went wrong',
            'message' => $message,
        ], $code);
    }
}


