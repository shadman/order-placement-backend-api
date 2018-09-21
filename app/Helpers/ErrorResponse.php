<?php

namespace App\Helpers;

use Illuminate\Http\Response as HttpResponse;

class ErrorResponse
{

    public static function invalidError($message)
    {    
        // Internal Server Error Response
        return response()->json(['error' => $message], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
    }


    public static function noRecordError($message)
    {    
        // No Record Found Error Response
        return response()->json(['error' => $message], HttpResponse::HTTP_NOT_FOUND);
    }


    public static function alreadyUpdatedError($message)
    {    
        // Already Upto Date Error Response
        return response()->json(['error' => $message], HttpResponse::HTTP_CONFLICT);
    }

}