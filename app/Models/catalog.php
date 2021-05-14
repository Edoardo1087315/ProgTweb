<?php

namespace App\Models;

use App\Models\Resources\Event;

class Catalog {

    public function getEvents() {
        return $events = Event::all();
    }
    
    public function getEventById($eventId){
        return Event::where('eventid',$eventId)->first();
}
}