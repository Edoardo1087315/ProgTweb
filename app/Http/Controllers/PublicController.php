<?php

namespace App\Http\Controllers;

use App\Models\application_public;
use App\Http\Requests\SearchRequest;

class PublicController extends Controller  {

    protected $_applicationPublic;
  


    public function __construct() {
        $this->_applicationPublic = new application_public;
    }

    public function showHome() {
        $ExpiringEvents = $this->_applicationPublic->getExpiringEvents();
        $PopularEvents = $this->_applicationPublic->getPopularEvents();
        return view('frontpage')->with('expiringEvents',$ExpiringEvents)
                                ->with('popularEvents', $PopularEvents );
    }
    
    public function showCatalog() {
        
        $TotalEvents = $this->_applicationPublic->getNotPaginateEvents();
        $Events = $this->_applicationPublic->getEvents();
        return view('catalogo')->with('events',$Events)->with('totalevents',$TotalEvents);
    }
    
    public function showModAdes() {

        return view('Mod_adesione');
    }
    
        public function showModForn() {

        return view('Mod_Fornitura_Servizi');
    }
    
    public function showFaq() {
        $Faq = $this->_applicationPublic->getFaq();
        return view('Faq')->with('faq',$Faq); //aggiunta faq.php, Faq.php
    }
    public function showEvent($idevent) {
        $Event = $this->_applicationPublic->getEventById($idevent);
        $numPartecipero = $this->_applicationPublic->getNumPartecipero($idevent);
        return view('Pag_evento')->with('event',$Event)->with('nPartecipero',$numPartecipero);
    }
    public function showAccedi() {

        return view('Accedi');
    }
     public function showRegistrati() {

        return view('Registrati');
    }
    public function search(SearchRequest $request) {
        $filters = array('descrizione' => $request->descrizione,'luogo' =>$request->luogo,'data' =>$request->data, 'organizzazione' => $request->organizzazione);
        $Events = $this->_applicationPublic->getEventsBySearch($filters);
        $TotalEvents = $this->_applicationPublic->getNotPaginateEvents();
        
        return view('catalogo')->with('events',$Events)->with('totalevents',$TotalEvents)->with('filters',$filters);
        /*return response()->json(['redirect' => route('catalog')]);*/     
    }
   
}