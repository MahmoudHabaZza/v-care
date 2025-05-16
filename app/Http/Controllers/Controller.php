<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse($data,$message = "Success",$statusCode = 200){
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ],$statusCode);
    }

    public function errorResponse($message = "Something Went Wrong!",$statusCode = 400){ // 400 => Bad Request
        return response()->json([
            'success' => false,
            'message' => $message
        ],$statusCode);
    }  
}
