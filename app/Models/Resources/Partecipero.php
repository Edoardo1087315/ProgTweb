<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Partecipero extends Model {
    
    protected $table = 'partecipero';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id']; //id non modificabile
}