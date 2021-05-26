<?php

namespace App\Models;

use App\Models\Resources\Event;
use Illuminate\Support\Facades\Auth;
class Catalog {

    public function getEvents() {
       return Event::paginate(10);
    }
    public function getNotPaginateEvents() {
       return Event::all();
    }
    
    public function getEventById($eventId){
        return Event::where('eventid',$eventId)->first();
    }
    public function getExpiringEvents(){
        return $events = Event::orderBy('data')->take(5)->get();
    }
    
    public function getCompanyEvents() {
        $societa = Auth::user()->nome;
        return $events = Event::where('societa',$societa)->get();
    }

    public function getEventsBySearch($request){
        return Event::where([['descrizione', 'like', '%' . $request['descrizione'] . '%'],
                ['luogo', 'Like' ,$request['luogo']],
                ['data', 'Like',$request['data']],
                ['societa', 'Like', $request['organizzazione']]])->paginate(10);
    }
     public function getPopularEvents(){
        return $events = Event::orderBy('bigl_acquis','desc')->take(5)->get();
    }
    
}