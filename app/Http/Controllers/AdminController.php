<?php

namespace App\Http\Controllers;

use App\User;

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
}