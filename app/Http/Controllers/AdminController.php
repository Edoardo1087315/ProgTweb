<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Ticket;
use App\Http\Requests\NewCompanyRequest;
use Illuminate\Support\Facades\Hash;

Class AdminController extends Controller{

        protected $_userModel;
    
        public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_userModel =new User;
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
            return redirect('AreaAmministratore');
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
            return redirect('AreaAmministratore');
        }
        
        public function getCompanyToDelete($id) {
        $this->_userModel->getUserById($id)->delete();
        return redirect('AreaAmministratore');
    }

    public function getCompanyToUpdate($id) {
        $selected_company = $this->_userModel->getUserById($id);
        $users = $this->_userModel->getUsers();
        return view('Area_Admin')->with('selected_company', $selected_company)->with('users', $users);
    }

}