<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\User;
class UserController extends Controller{
  public function getAll(){
       $this->sendPage('adminview/adminuser', ["adminuserList" => User::all()]);
  }
  public function add(){
    $this->sendPage('adminview/adminuser_add');
  }
  public function update($id){
  $useri= User::find($id);
  $this->sendPage('adminview/adminuser_update',["useri" => $useri]);
  }
}
