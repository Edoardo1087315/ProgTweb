<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuyTicketRequest;
use App\Http\Requests\UpdateUserRequest;
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
    
    public function showAreaRiservata(){
        $User = $this->_userModel->getUser();
        return view('Area_Utente')->with('user',$User);
    }
    public function updateUser(UpdateUserRequest $request){
        $User = $this->_userModel->getUser();
        $modifiedCredentials = array('nome' => $request->nome,'cognome' => $request->cognome,
                                     'data_nascita' => $request->data_nascita, 'telefono' => $request->telefono,
                                     'email' => $request->email);
        $newUser = $this->_userModel->modifyCredentials($User,$modifiedCredentials);
        return view('Area_Utente')->with('user',$newUser);
    }
    
    public function showStorico(){
        $tickets = $this->_userModel->getTickets();
        return view('Storico')->with('tickets',$tickets);
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
         $Card = array('nome' => $request->cardname,'numero' => $request->cardnumber,
                       'data' => "$request->year/$request->month",'cvv' => $request->cvv);
         return view('Riepilogo')->with('event',$Event)
                                 ->with('user', $User)
                                 ->with('ticket',$Ticket)
                                 ->with('card',$Card);
    }
    
}
