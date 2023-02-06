<?php
namespace Crm\Base\BaseResponse;

use Illuminate\Http\Response;

class BaseResponse {
  
    static public function notFoundJson(string $message ="Not Found" )
    {
        return response()->json(['status'=>$message], Response::HTTP_NOT_FOUND);
    }

    static public function badRequestJson(string $message ='Bad Request')
    {
        return response()->json(['status'=>$message], Response::HTTP_BAD_REQUEST);
    }
   
    static public function deleteRequestJson(string $message ='Deleted')
    {
        return response()->json(['status'=>$message], Response::HTTP_OK);
    }



}