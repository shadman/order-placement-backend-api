<?php

namespace App\Helpers;

use Illuminate\Http\Response as HttpResponse;

class CalculateDistance
{

    public static function calculate($order)
    {
        return $order->start_latitude . '-' . $order->start_longitude .','. $order->end_latitude .'-'. $order->end_longitude;
    }

}