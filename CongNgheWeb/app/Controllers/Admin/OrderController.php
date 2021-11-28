<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Donhang;
use App\Models\User;
use App\Models\Dienthoai;
class OrderController extends Controller{
  public function getAll(){
   $donhangList= Donhang::all();
   foreach($donhangList as $dhi){
     $user = User::find($dhi["idKhachhang"]);
     $dhi["tenkhachhang"]=$user["tentaikhoan"];
     $dhi["sdtkhachhang"]=$user["sdt"];

     $dhi["itemList"]=$dhi->chitietdonhang()->get();
      foreach($dhi["itemList"] as $orderItemi){

        $orderItemi["tensanpham"]=Dienthoai::find($orderItemi["idSanpham"])->TenSanpham;
      }

   }
    $this->sendPage('adminview/adminorder', ["adminorderList" => $donhangList]);
 }

public function add(){
    $this->sendPage('adminview/adminorder_add');
  }


public function update($id){
  $Dhi= Donhang::find($id);
  $this->sendPage('adminview/adminorder_update',["Dhi" => $Dhi]);
  }
}
// foreach($orders as $order){

// }
