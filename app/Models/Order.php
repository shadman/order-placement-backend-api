<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{

    protected $fillable = ['start_latitude', 'start_longitude', 'end_latitude', 'end_longitude','status'];
    public $timestamps = false;

    /**
     * Create order
     */
    static public function createRecord($parameters) {

        $order = self::create(
            [
                'start_latitude' => $parameters['origin'][0],
                'start_longitude' => $parameters['origin'][1],
                'end_latitude' => $parameters['destination'][0],
                'end_longitude' => $parameters['destination'][1],
                'status' => config('app.order_status.unassign'),
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        );

        return $order;
    }


    /**
     * Update order
     */
    static public function updateStatus($order) {
        
        $order->status = config('app.order_status.success');
        $order->save();
        
        return $order;
    }


    /**
     * List of orders
     */
    static public function list() {

    }

}
