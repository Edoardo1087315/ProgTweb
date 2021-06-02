<?php

namespace App\Http\Controllers;

use App\Models\application_company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources\Event;
use App\Http\Requests\NewEventRequest;
use App\Http\Requests\DeleteEventRequest;

class CompanyController extends Controller {

    protected $_companyModel;

    public function __construct() {
        $this->middleware('can:isCompany');
        $this->_companyModel = new application_company;
    }

    public function showAreaOrg() {

        $TotalEvents = $this->_companyModel->getCompanyEvents();
        $GuadagnoTot = 0;
        foreach ($TotalEvents as $event) {
            $GuadagnoTot += $event->incassoTotale;
        }
        return view('Area_Organizzazione')->with('events', $TotalEvents)->with('guadagno', $GuadagnoTot);
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
        $event = $this->_companyModel->updateEventById($request->eventid, $request, $imageName);


        if ($request->hasFile('image')) {
            $destinationPath = storage_path() . '/app/EventImages';
            $image->move($destinationPath, $imageName);
        };

        return redirect('AreaOrganizzazione');
    }

    public function deleteEvent(DeleteEventRequest $request) {
        $this->_companyModel->deleteTicketById($request->eventid);
        $this->_companyModel->deleteEventById($request->eventid);
        return redirect('AreaOrganizzazione');
    }

    public function getEventToUpdate($id) {
        $selected_event = $this->_companyModel->getEventById($id);
        $TotalEvents = $this->_companyModel->getCompanyEvents();

        $GuadagnoTot = 0;
        foreach ($TotalEvents as $event) {
            $GuadagnoTot += $event->incassoTotale;
        }
        return view('Area_Organizzazione')->with('selected_event', $selected_event)->with('events', $TotalEvents)->with('guadagno', $GuadagnoTot);
    }

}
