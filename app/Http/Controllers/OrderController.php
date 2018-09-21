<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Facade\OrderFacade;
use App\Validators\OrderValidator;

class OrderController extends Controller
{

    /**
     * Create Order
     * 
     * @param  \App\Models\Order $request 
     * @return json
     */
    public function place(Request $request){

        echo 'place code here';
        
    }


    /**
     * Take Order
     * 
     * @param  \App\Models\Order $request 
     * @return json
     */
    public function take(Request $request){

        echo 'place code here';

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
