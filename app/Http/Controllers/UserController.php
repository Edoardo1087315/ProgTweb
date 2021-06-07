<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuyTicketRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ParteciperoRequest;
use App\Models\application_public;
use App\Models\application_user;
use Illuminate\Support\Facades\Session;

class UserController extends Controller{
    
     protected $_applicationPublic;
     protected $_applicationUser;
    
    public function __construct() {
        $this->middleware('can:isUser');
           $this->_applicationPublic = new application_public;
           $this->_applicationUser =new application_user;
    }
    
    public function showAreaRiservata(){
        $User = $this->_applicationUser->getUser();
        return view('Area_Utente')->with('user',$User);
    }
    public function updateUser(UpdateUserRequest $request){
        $User = $this->_applicationUser->getUser();
        $this->_applicationUser->modifyCredentials($User->id,$request->validated());
        /*return redirect("AreaRiservata/{$User->id}");*/
        return response()->json(['redirect' => route('Area_Utente',[$User->id])]);
    }
    
    public function showStorico(){
        $tickets = $this->_applicationUser->getTickets();
        return view('Storico')->with('tickets',$tickets);
    }
    
    public function showBuyForm($eventid) {
         $Event = $this->_applicationPublic->getEventById($eventid);
         return view('BuyTicket')->with('event',$Event);
    }
    public function buyForm(BuyTicketRequest $request){
        Session::put('eventId',$request->eventId );
        Session::put('nome', $request->cardname);
        Session::put('numero', $request->cardnumber);
        Session::put('data', "$request->year/$request->month");
        Session::put('cvv', $request->cvv);
        $User = $this->_applicationUser->getUser();
        $this->_applicationUser->modifyTicketNumberById($request->eventId, $request->numbiglietti);
         //Aggiorna incasso di un evento relativo alla compagnia
        $this->_applicationUser->modifyTicketIncassoById($request->eventId,$request->numbiglietti); 
        $Ticket = $this->_applicationUser->insertTicket($request->eventId,$User->id,$request->numbiglietti,$request->priceBox);
        Session::put('ticketId',$Ticket->TransId);
        
        return response()->json(['redirect' => route('Riepilogo')]);    
    }
    public function buyFormProcess() {
         $Event = $this->_applicationPublic->getEventById(Session::get('eventId'));
         $Ticket = $this->_applicationUser->getTicketById(Session::get('ticketId'));
         $User = $this->_applicationUser->getUser();
         $Card = array('nome' => Session::get('nome'),'numero' => Session::get('numero'),
                       'data' => Session::get('data'),'cvv' => Session::get('cvv'));
         return view('Riepilogo')->with('event',$Event)
                                 ->with('user', $User)
                                 ->with('ticket',$Ticket)
                                 ->with('card',$Card);
    }
    public function partecipero(ParteciperoRequest $request) {
        $User = $this->_applicationUser->getUser();
        $this->_applicationUser->addPartecipero($User->id,$request->eventid);
        return redirect("PagEvento/{$request->eventid}");
    }
    
    public function annullaPartecipazione(ParteciperoRequest $request) {
        $User = $this->_applicationUser->getUser();
        $this->_applicationUser->deletePartecipero($User->id,$request->eventid);
        return redirect("PagEvento/{$request->eventid}");
    }
}
