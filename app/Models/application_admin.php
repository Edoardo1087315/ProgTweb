<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use App\Models\Resources\Ticket;
use App\User;
use App\Models\Resources\Event;
use App\Models\Resources\Faqs;
use Illuminate\Support\Facades\Hash;


/**
 * Description of application_admin
 *
 * @author lorti
 */
class application_admin {
    
    public function getUsers(){
        return User::all();
    }
    
    public function getUserById($userid){
        return User::where('id',$userid)->first();
    }
    
    public function deleteUserById($userid){
        Event::where('societaid',$userid)->delete();
        User::where('id',$userid)->delete();
    }
    
    public function deleteTicketsById($userId){
        Ticket::where('user_id',$userId)->delete();
    }
    
    public function addCompany($company){
         $user = new User;
         $user->fill($company->validated());
         $user->role = 'company';
         $user->password = Hash::make($company->password);
         $user->save();
    }
    
    public function updateCompany($companyAttrs){
        $user = User::find($companyAttrs->companyid);
        $user->nome = $companyAttrs->nome;
        $user->data_nascita = $companyAttrs->data_nascita;
        $user->sitoweb = $companyAttrs->sitoweb;
        $user->email = $companyAttrs->email;
        $user->telefono = $companyAttrs->telefono;
        $user->save();
    }
    
     public function addFaq($faqToAdd){
        $faq = new Faqs;
        $faq->fill($faqToAdd->validated());
        $faq->save();
    }
    
    public function updateFaq($faqToUpdate){
        $faq = Faqs::find($faqToUpdate->faqId);
        $faq->Domanda = $faqToUpdate->Domanda;
        $faq->Risposta = $faqToUpdate->Risposta;
        $faq->save();
    }
     public function deleteFaqById($faqID){
        Faqs::where('faqId',$faqID)->delete();
    }
}

