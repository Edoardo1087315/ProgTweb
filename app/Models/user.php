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

/**
 * Description of user
 *
 * @author lorti
 */
class user {
    
    public function modifyTicketNumberById($eventId,$numbiglietti){
        $Event = Event::find($eventId);
        $Event->bigl_acquis = $Event->bigl_acquis + $numbiglietti;
        $Event->bigl_tot =  $Event->bigl_tot - $numbiglietti;
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
}
