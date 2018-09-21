<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Facade\OrderFacade;
use App\Validators\OrderValidator;
use App\Helpers\ErrorResponse;

class OrderController extends Controller
{

    /**
     * Create Order
     * 
     * JSON Request
     * {
     * "origin": ["START_LATITUDE", "START_LONGTITUDE"],
     * "destination": ["END_LATITUDE", "END_LONGTITUDE"]
     * }
     *  
     * @param  \App\Models\Order $request 
     * 
     * @return json
     */
    public function place(Request $request){

        $parameters = $request->json()->all();

        $validator = OrderValidator::order($parameters);
        if (!$validator->fails()) {
            return OrderFacade::createOrder($parameters);
        }

        return ErrorResponse::invalidError('ERROR_DESCRIPTION');
    }


    /**
     * Take Order
     * 
     * @param  \App\Models\Order $request 
     * @return json
     */
    public function take(Request $request, $id){

        $parameters = $request->json()->all();

        $validator = OrderValidator::take($parameters);
        if (!$validator->fails()) {
            return OrderFacade::updateOrder($parameters, $id);
        }

        return ErrorResponse::invalidError('ERROR_DESCRIPTION');
    }


    /**
     * List Order
     * 
     * @param  \App\Models\Order $request 
     * @return json
     */
    public function list(Request $request){

        echo 'place code here';

    }

}
