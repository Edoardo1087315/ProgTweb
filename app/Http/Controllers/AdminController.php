<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\catalog;
use App\Models\Resources\Ticket;
use App\Http\Requests\NewCompanyRequest;
use App\Http\Requests\DeleteUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\faq;
use App\Models\Resources\Faqs;
use App\Http\Requests\NewFaqRequest;
use App\Http\Requests\DeleteFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

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
    
        public function deleteUser(DeleteUserRequest $request){
        Ticket::where('user_id',$request->userid)->delete();
        User::where('id',$request->userid)->delete();
        return redirect('AreaAmministratore');
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
        
        public function getCompanyToDelete(DeleteUserRequest $request) {
        User::where('id',$request->userid)->delete();
        return redirect('AreaAmministratore');
    }
    
    public function getFaqToDelete(DeleteFaqRequest $request){
        Faqs::where('faqId',$request->faqId)->delete();
        return redirect('Faq');
    }
    
    public function getFaqToUpdate(UpdateFaqRequest $request){
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