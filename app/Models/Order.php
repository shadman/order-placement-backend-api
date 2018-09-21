<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{

    protected $fillable = [];
    public $timestamps = false;

    /**
     * Create order
     */
    static public function create_record($parameters) {

    }


    /**
     * Update order
     */
    static public function update_record($parameters, $orderId) {

    }


    /**
     * List of orders
     */
    static public function list() {

    }

}
