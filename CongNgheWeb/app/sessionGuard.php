<?php

namespace App;

use App\Models\User;

class SessionGuard
{
    protected static $user;

    public static function isUserLoggedIn()
      {
          return isset($_SESSION['user_id']);
      }

    public static function user()
     {
       if (! static::$user && static::isUserLoggedIn()) {
         //neu nguoi dung da dang nhap va bien user chua duoc set gia tri
         //thi ta set gia tri cho $user
           static::$user = User::find($_SESSION['user_id']);
       }
       return static::$user;
     }
     public static function justAcceptAdmin(){
       if (! static::isUserLoggedIn()){
         //neu nguoi dung chua dang nhap thi chuyen den trang dang nhap
             exit_redirect("/login");
       }else if(static::user()->role=='cus'){
         //neu user la khach hang thi khong dc phep vao trang admin
            exit_redirect("/");
         }
     }
    

   public static function logout()
    {
       static::$user = null;
       session_unset();
       session_destroy();
    }
  }
