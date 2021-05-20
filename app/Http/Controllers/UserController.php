<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalog;

class UserController extends Controller{
    
     protected $_catalogModel;
    
    public function __construct() {
        $this->middleware('can:isUser');
           $this->_catalogModel = new catalog;
    }
    public function showBuyForm($eventid) {
         $Event = $this->_catalogModel->getEventById($eventid);
         return view('BuyTicket')->with('event',$Event);
    }
    
}
