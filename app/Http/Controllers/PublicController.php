<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class PublicController extends Controller {

    //protected $_catalogModel;
    
    //public function __construct() {
    //    $this->_catalogModel = new Catalog;
    //}

    public function showHome() {

        return view('frontpage');
    }
    
    public function showCatalog() {

        return view('catalog');
    }
    
    public function showModAdes() {

        return view('Mod_adesione');
    }
}