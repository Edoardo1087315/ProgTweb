<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use App\Models\Resources\Event;
use App\Models\Resources\Ticket;
use App\User;

/**
 * Description of user
 *
 * @author lorti
 */
class application_user {
    
    public function modifyTicketNumberById($eventId,$numbiglietti){
        $Event = Event::find($eventId);
        $Event->bigl_acquis = $Event->bigl_acquis + $numbiglietti;
        $Event->save();
    }
    public function insertTicket($eventId,$userId,$nBiglietti,$price){
        $data = array('user_id' => $userId,'eventid' => $eventId, 'quantita' => $nBiglietti, 'prezzo' => $price ,'data_acquisto' => date("Y/m/d"));
        $ticket = new Ticket();
        $ticket->fill($data);
        $ticket->save();
        return $ticket;
    }
    public function getUser(){
        return Auth::user();
    }
    public function modifyCredentials($userid,$credentials){
        $user = User::find($userid);
        $user->fill($credentials);
        $user->save();
        return $user;
    }
    public function getTickets(){
        $user = Auth::user();
        $tickets = Ticket::where('user_id',$user->id)->join('Event','Event.eventid','=','Ticket.eventid')->orderBy('data_acquisto','desc')->
                        get(['event.*', 'ticket.TransId as TransId', 'ticket.data_acquisto as data_acquisto','ticket.prezzo as costoTot','ticket.quantita as quantita','ticket.user_id as user_id, ticket.eventid as eventid']);
                        
        return $tickets;
    }
    
}
