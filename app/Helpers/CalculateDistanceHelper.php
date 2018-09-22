<?php

namespace App\Helpers;

use Illuminate\Http\Response as HttpResponse;

class CalculateDistanceHelper
{

    public static function calculate($order)
    {
    	# meters
        return 4000;
        //$order->start_latitude . '-' . $order->start_longitude .','. $order->end_latitude .'-'. $order->end_longitude;
    }

}