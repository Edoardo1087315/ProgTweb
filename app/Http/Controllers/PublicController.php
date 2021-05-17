<?php

namespace App\Http\Controllers;

use App\Models\catalog;

class PublicController extends Controller {

    protected $_catalogModel;
    
    public function __construct() {
        $this->_catalogModel = new catalog;
    }

    public function showHome() {
        $Events = $this->_catalogModel->getExpiringEvents();
        return view('frontpage')->with('events',$Events);
    }
    
    public function showCatalog() {
        
        $Events = $this->_catalogModel->getEvents();
        return view('catalogo')->with('events',$Events);
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
    public function showBuyForm($eventid) {
         $Event = $this->_catalogModel->getEventById($eventid);
         return view('BuyTicket')->with('event',$Event);
    }
}