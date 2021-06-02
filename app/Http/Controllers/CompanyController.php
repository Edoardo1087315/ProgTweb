<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources\Event;
use App\Http\Requests\NewEventRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeleteEventRequest;

class CompanyController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isCompany');
        $this->_catalogModel = new catalog;
    }

    public function showAreaOrg() {

        $TotalEvents = $this->_catalogModel->getCompanyEvents();
        return view('Area_Organizzazione')->with('events', $TotalEvents);
    }

    public function storeEvent(NewEventRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $event = new Event;
        $event->fill($request->validated());
        $event->image = $imageName;
        $event->save();

        if (!is_null($imageName)) {
            $destinationPath = storage_path() . '/app/EventImages';
            $image->move($destinationPath, $imageName);
        };

        return redirect('AreaOrganizzazione');
    }

    public function updateEvent(NewEventRequest $request) {


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = $request->image_path;
        }
        $event = $this->_catalogModel->getEventById($request->eventid);
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

        $event->image = $imageName;
        $event->save();

        if ($request->hasFile('image')) {
            $destinationPath = storage_path() . '/app/EventImages';
            $image->move($destinationPath, $imageName);
        };

        return redirect('AreaOrganizzazione');
    }

    public function deleteEvent(DeleteEventRequest $request) {
        $this->_catalogModel->getEventById($request->eventid)->delete();
        return redirect('AreaOrganizzazione');
    }

    public function getEventToUpdate($id) {
        $selected_event = $this->_catalogModel->getEventById($id);
        $TotalEvents = $this->_catalogModel->getCompanyEvents();
        return view('Area_Organizzazione')->with('selected_event', $selected_event)->with('events', $TotalEvents);
    }

    //
}
