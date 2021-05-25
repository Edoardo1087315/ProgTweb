<?php

namespace App\Models;

use App\Models\Resources\Faqs;

class Faq {

    public function getFaq() {
       return Faqs::all();
    }
   
    
}