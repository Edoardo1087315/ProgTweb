<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Ticket;

Class AdminController extends Controller{

        protected $_userModel;
    
        public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_userModel =new user;
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
}