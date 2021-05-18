<?php

namespace App\Models;

use App\Models\Resources\Event;

class Catalog {

    public function getEvents() {
       return Event::paginate(10);
    }
    
    public function getEventById($eventId){
        return Event::where('eventid',$eventId)->first();
    }
    public function getExpiringEvents(){
        return $events = Event::orderBy('data')->take(5)->get();
    }
}