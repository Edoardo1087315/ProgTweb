<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\catalog;
use App\Models\Resources\Ticket;
use App\Http\Requests\NewCompanyRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\faq;
use App\Models\Resources\Faqs;
use App\Http\Requests\NewFaqRequest;
use App\Http\Requests\DeleteFaqRequest;

Class AdminController extends Controller{

        protected $_userModel;
        protected $_catalogModel;
        protected $_FaqModel;
    
        public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_userModel =new User;
        $this->_catalogModel = new catalog;
        $this->_FaqModel = new faq;
        }
         
        public function showAreaAdmin(){
        $users = $this->_userModel->getUsers();
        return view('Area_admin')->with('users',$users);
    }
    
        public function deleteUser($userid){
            Ticket::where('user_id',$userid)->delete();
            User::where('id',$userid)->delete();
            $users = $this->_userModel->getUsers();
            return view('Area_admin')->with('users',$users);
        }
        
        public function newCompanyRequest(NewCompanyRequest $request) {
            $user = new User;
            $user->fill($request->validated());
            $user->role = 'company';
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['redirect' => route('Area_Admin')]);
        }
        
        public function updateCompanyRequest(NewCompanyRequest $request){
            $user = $this->_userModel->getUserById($request->companyid);
            
                 $user->nome = $request->nome;
                 $user->cognome = $request->cognome;
                 $user->data_nascita = $request->data_nascita;
                 $user->sitoweb = $request->sitoweb;
                 $user->email = $request->email;
                 $user->telefono = $request->telefono;
                 
                 $user->save();
            return response()->json(['redirect' => route('Area_Admin')]);
        }
        
        public function getCompanyToDelete($id) {
        $this->_userModel->getUserById($id)->delete();
        return redirect('AreaAmministratore');
    }

    public function getCompanyToUpdate($id) {
        $selected_company = $this->_userModel->getUserById($id);
        $users = $this->_userModel->getUsers();
        $events = $this->_catalogModel->getNotPaginateEvents();
        return view('Area_Admin')->with('selected_company', $selected_company)->with('users', $users);
    }
    
    public function getFaqToDelete(DeleteFaqRequest $request){
        Faqs::where('faqId',$request->faqId)->delete();
        return redirect('Faq');
    }
    
    public function getFaqToUpdate(NewFaqRequest $request){
      $faq = $this->_FaqModel->getFaqById($request->faqId);
           $faq->Domanda = $request->Domanda;
           $faq->Risposta = $request->Risposta;
      
      $faq->save();
           
            return response()->json(['redirect' => route('Faq')]);
    }
    
    public function newFaqRequest(NewFaqRequest $request) {
            $faq = new Faqs;
            $faq->fill($request->validated());
            $faq->save();
            return response()->json(['redirect' => route('Faq')]);
        }
    public function showAdminFaq(){
        $Faq = Faqs::all();
        return view('Faq_Admin')->with('_faq',$Faq);
    }
    
}