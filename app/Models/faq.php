<?php

namespace App\Models;

use App\Models\Resources\Faqs;

class Faq {

    public function getFaq() {
       return Faqs::all();
    }
    
    public function getFaqById($id){
        return Faqs::where('faqId',$id)->first();
    }
   
    
}