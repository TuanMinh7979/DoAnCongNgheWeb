<?php
namespace App\Controllers;
use App\Models\User;
use App\SessionGuard as Guard;
class LoginController extends Controller{
  public function showLoginForm(){
    $data = [
			'errors' => session_get_once('errors'),
			'old' => $this->getSavedFormValues()
      //buoc nay cung su dung session_get_once nen se mat di session cua form

		];

     $this->sendPage('auth/login', $data);


   }
   public function loginExe(){
     $inp_user= $this->filterUserInfo($_POST);
     $error=[];
     $user= User::where('tentaikhoan', $inp_user['tentaikhoan'])->first();
     if (!$user) {
			// Người dùng không tồn tại...
			$errors['tentaikhoan'] = 'Tài khoản không tồn tại!';

		}else if($user->matkhau==$inp_user["matkhau"]){
      //th ton tai tai khoan, ta tiep tuc check matkhau neu matkhau dung
      //thi ta luu id cua user vao session va chuyen den trang admin
        $_SESSION['user_id'] = $user->id;
      //thi redirect den trang cua admin va exit()
       exit_redirect("/");
    }//truong hop tai khoan va mat khau deu sai ta luu lai tentaikhoan
    //trong session
    	$errors['matkhau'] = 'Mật khẩu không chính xác!';
      $this->saveFormValues($_POST, ['password']);
      //sau do redirect den trang login voi thong bao loi
      exit_redirect('/login', ['errors' => $errors]);
   }
   public function logoutExe(){
     Guard::logout();
 		 exit_redirect('/');

   }

   //UTIL METHOD
   protected function filterUserInfo(array $data)
	{
		return [
			'tentaikhoan' => $data['tentaikhoan'],
			'matkhau' => $data['matkhau']
		];
	}

}
