<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    
    protected $table = 'event';
    protected $primaryKey = 'EventId';
    public $timestamps = false;
}