<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Http\Requests\SearchRequest;

class PublicController extends Controller  {

    protected $_catalogModel;
    
    public function __construct() {
        $this->_catalogModel = new catalog;
    }

    public function showHome() {
        $ExpiringEvents = $this->_catalogModel->getExpiringEvents();
        $PopularEvents = $this->_catalogModel->getPopularEvents();
        return view('frontpage')->with('expiringEvents',$ExpiringEvents)
                                ->with('popularEvents', $PopularEvents );
    }
    
    public function showCatalog() {
        
        $TotalEvents = $this->_catalogModel->getNotPaginateEvents();
        $Events = $this->_catalogModel->getEvents();
        return view('catalogo')->with('events',$Events)->with('totalevents',$TotalEvents);
    }
    
    public function showModAdes() {

        return view('Mod_adesione');
    }
    
        public function showModForn() {

        return view('Mod_Fornitura_Servizi');
    }
    
    public function showFaq() {

        return view('Faq');
    }
    public function showEvent($eventid) {
        $Event = $this->_catalogModel->getEventById($eventid);
        return view('Pag_evento')->with('event',$Event);
    }
    public function showAccedi() {

        return view('Accedi');
    }
     public function showRegistrati() {

        return view('Registrati');
    }
    public function search(SearchRequest $request) {
        $filters = array('descrizione' => $request->descrizione,'luogo' =>$request->luogo,'data' =>$request->data, 'organizzazione' => $request->organizzazione);
        $Events = $this->_catalogModel->getEventsBySearch($filters);
        $TotalEvents = $this->_catalogModel->getNotPaginateEvents();
        
        return view('catalogo')->with('events',$Events)->with('totalevents',$TotalEvents);        
    }
    
    public function showAreaAdmin(){
        return view('Area_admin');
    }
}