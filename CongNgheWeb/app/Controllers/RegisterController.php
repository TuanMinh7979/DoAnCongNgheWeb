<?php
namespace App\Controllers;
use App\Models\User;
use App\SessionGuard as Guard;
class RegisterController extends Controller{
  public function showRegisterForm(){
    $data = [
      'errors' => session_get_once('errors'),
			'mes' => session_get_once('mes'),
    ];

     $this->sendPage('auth/register', $data);
    }
  public function registerExe(){
   $inp_data= $this->filterUserInfo($_POST);

   $user= User::where('tentaikhoan', $inp_data['tentaikhoan'])->first();
   if($user){
     $errors["tentaikhoan"]="Tài khoản đã tồn tại";

   }else if($inp_data["matkhau"]==$inp_data["nhaplaimatkhau"]){
     $useri= new User();
     $useri->fill($inp_data);
     $useri["role"]="cus";
     $saved = $useri->save();
     if($saved){
     $mess="Đăng ký thành công";
     }
    exit_redirect("/register",["mes"=> $mess]);
  }else{
    $errors["nhaplaimatkhau"]="Xác nhận mật khẩu không chính xác";
  }
    exit_redirect('/register', ['errors' => $errors]);
  }


  protected function filterUserInfo(array $data)
 {
   return [
     'tentaikhoan' => $data['tentaikhoan'],
     'matkhau' => $data['matkhau'],
     'nhaplaimatkhau'=> $data['nhaplaimatkhau'],
     'sdt'=> $data['sdt'],
     'diachi'=> $data['diachi']
   ];
 }


   }
