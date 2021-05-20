<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    public function __construct() {
        $this->middleware('can:isUser');
    }
    public function showBuyForm($eventid) {
         $Event = $this->_catalogModel->getEventById($eventid);
         return view('BuyTicket')->with('event',$Event);
    }
    
}
