<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
class AdminController extends Controller{
  public function showAdminView(){
     Guard::justAcceptAdmin();
     $this->sendPage('adminview/admin');
  }

}
