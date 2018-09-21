<?php

namespace App\Facade;

use Illuminate\Http\Response as HttpResponse;
use App\Models\Order;
use App\Helpers\CalculateDistance;
use App\Helpers\ErrorResponse;

class OrderFacade
{

    public static function createOrder($parameters)
    {
	    $createdOrder = Order::createRecord($parameters);
	    $response = [
	    	'id' => $createdOrder->id,
	    	'distance' => CalculateDistance::calculate($createdOrder),
	    	'status' => $createdOrder->status,
	    ];
	    return response()->json($response, HttpResponse::HTTP_OK);
    }


    public static function updateOrder($parameters, $id)
    {

    	$order = Order::select('id', 'status')->where('id', $id)->first();
		if($order) {
			if ($order->status == config('app.order_status.success')) 
				return ErrorResponse::alreadyUpdatedError('ORDER_ALREADY_BEEN_TAKEN');

			$updatedRecord = Order::updateStatus($order);
			if ($updatedRecord) {
				$response = [ 'status' => $updatedRecord->status ];
		    	return response()->json($response, HttpResponse::HTTP_OK);
	    	}
		}

		return ErrorResponse::noRecordError('No record found.');
    }

}
