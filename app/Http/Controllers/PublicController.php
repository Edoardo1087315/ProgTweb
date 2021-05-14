<?php

namespace App\Http\Controllers;

use App\Models\catalog;

class PublicController extends Controller {

    protected $_catalogModel;
    
    public function __construct() {
        $this->_catalogModel = new catalog;
    }

    public function showHome() {

        return view('frontpage');
    }
    
    public function showCatalog() {
        
        $Events = $this->_catalogModel->getEvents();
        return view('catalogo')->with('events',$Events);
    }
    
    public function showModAdes() {

        return view('Mod_adesione');
    }
    public function showFaq() {

        return view('Faq');
    }
}