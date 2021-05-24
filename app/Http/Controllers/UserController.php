<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuyTicketRequest;
use App\Models\catalog;
use App\Models\user;

class UserController extends Controller{
    
     protected $_catalogModel;
     protected $_userModel;
    
    public function __construct() {
        $this->middleware('can:isUser');
           $this->_catalogModel = new catalog;
           $this->_userModel =new user;
    }
    public function showBuyForm($eventid) {
         $Event = $this->_catalogModel->getEventById($eventid);
         return view('BuyTicket')->with('event',$Event);
    }
    public function buyFormProcess(BuyTicketRequest $request){
         $Event = $this->_catalogModel->getEventById($request->eventId);
         $User = $this->_userModel->getUser();
         $this->_userModel->modifyTicketNumberById($request->eventId,$request->numbiglietti);
         $Ticket = $this->_userModel->insertTicket($request->eventId,$User->id,$request->numbiglietti,$request->priceBox);
         return view('Riepilogo')->with('event',$Event)
                                 ->with('user', $User)
                                 ->with('ticket',$Ticket);
    }
    
}
