<?php

namespace App\Http\Controllers;

use App\Models\application_public;
use App\Models\application_admin;
use App\Http\Requests\NewCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\NewFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Requests\DeleteFaqRequest;

Class AdminController extends Controller {

 protected $_applicationPublic;
protected $_applicationAdmin;

 public function __construct() {
$this->middleware('can:isAdmin');
$this->_applicationPublic = new application_public;
$this->_applicationAdmin = new application_admin;
}

 public function showAreaAdmin() {
$users = $this->_applicationAdmin->getUsers();
$companies = $this->_applicationAdmin->getCompanies();
$companiesWithAnalisi = [];
foreach ($companies as $company)
$companiesWithAnalisi[$company->id] = ["company" => $company, 'incasso' => $this->_applicationAdmin->getCompanyEventsIncasso($company->id), 'venduti' => $this->_applicationAdmin->getCompanyEventsVenduti($company->id)];

 return view('Area_admin')->with('users', $users)->with('companies', $companies)->with('companiesWithAnalisi', $companiesWithAnalisi);
}

/*
public function showAreaAdmin(){
$users = $this->_applicationAdmin->getUsers();
return view('Area_admin')->with('users',$users);
} */

 public function deleteUser(DeleteUserRequest $request) {
$this->_applicationAdmin->deleteTicketsById($request->userid);
$this->_applicationAdmin->deleteUserById($request->userid);
return redirect('AreaAmministratore');
}

 public function newCompanyRequest(NewCompanyRequest $request) {
$this->_applicationAdmin->addCompany($request);
return response()->json(['redirect' => route('Area_Admin')]);
}

 public function updateCompanyRequest(UpdateCompanyRequest $request) {
$this->_applicationAdmin->updateCompany($request);
return response()->json(['redirect' => route('Area_Admin')]);
}

 public function getCompanyToUpdate($id) {
$selected_company = $this->_applicationAdmin->getUserById($id);
$users = $this->_applicationAdmin->getUsers();
$companies = $this->_applicationAdmin->getCompanies();
$companiesWithAnalisi = [];
foreach ($companies as $company)
$companiesWithAnalisi[$company->id] = ["company" => $company, 'incasso' => $this->_applicationAdmin->getCompanyEventsIncasso($company->id), 'venduti' => $this->_applicationAdmin->getCompanyEventsVenduti($company->id)];

 return view('Area_Admin')->with('users', $users)->with('companiesWithAnalisi', $companiesWithAnalisi);
}

 public function getFaqToDelete(DeleteFaqRequest $request) {
$this->_applicationAdmin->deleteFaqById($request->faqId);
return redirect('Faq');
}

 public function getFaqToUpdate(UpdateFaqRequest $request) {
$this->_applicationAdmin->updateFaq($request);
return response()->json(['redirect' => route('Faq')]);
}

 public function newFaqRequest(NewFaqRequest $request) {
$this->_applicationAdmin->addFaq($request);
return response()->json(['redirect' => route('Faq')]);
}

 public function showAdminFaq() {
$Faq = $this->_applicationPublic->getFaq();
return view('Faq_Admin')->with('_faq', $Faq);
}

}