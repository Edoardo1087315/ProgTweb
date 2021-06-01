<?php

namespace App\Models;

use App\Models\Resources\Event;
use Illuminate\Support\Facades\Auth;

class application_company {

    public function getEventById($eventId) {
        return Event::where('eventid', $eventId)->first();
    }

    public function getCompanyEvents() {
        $societa = Auth::user()->nome;
        return $events = Event::where('societa', $societa)->get();
    }

    public function updateEventById($id, $request,$imageName) {
        $event =  Event::find($id);
        $event->nome = $request->nome;
        $event->societa = $request->societa;
        $event->luogo = $request->luogo;
        $event->prezzo = $request->prezzo;
        $event->luogo = $request->luogo;
        $event->bigl_tot = $request->bigl_tot;
        $event->bigl_acquis = $request->bigl_acquis;
        $event->categoria = $request->categoria;
        $event->Ycord = $request->Ycord;
        $event->Xcord = $request->Xcord;
        $event->descrizione = $request->descrizione;
        $event->programma = $request->programma;
        $event->data = $request->data;
        $event->orario = $request->orario;
        $event->sconto = $request->sconto;

        if ($request->sconto) {
            $event->scontoPerc = $request->scontoPerc;
            $event->nGiorniAttSconto = $request->nGiorniAttSconto;
        } else {
            $event->scontoPerc = 0;
            $event->nGiorniAttSconto = 0;
        }
        $event->image = $imageName;
        $event->save();
    }

}
