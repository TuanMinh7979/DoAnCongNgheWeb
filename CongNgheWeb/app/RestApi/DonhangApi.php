<?php
namespace App\RestApi;
use App\Models\Donhang;
use App\Models\Chitietdonhang;

class DonhangApi extends BaseApi{
public function createExe(){
  //danh cho khach hang
  $data = json_decode(file_get_contents('php://input'), true);
  $Dh= new Donhang();
  $Dhdata=array();
  $Dhdata["tinhtrang"]="Đang mua";
  $Dhdata["thanhtien"]=$data["thanhtien"];
  $Dhdata["diachinhanhang"]=$data["diachinhanhang"];
  $Dhdata["idKhachhang"]=$data["idKhachhang"];
  $Dhdata["thoidiemdatmua"]=date("Y-m-d H:i:s");


  $Dh->fill($Dhdata);
  $saved = $Dh->save();
  $chitietdonhanglist=$data["chitietdonhang"];

  foreach($chitietdonhanglist as $chitieti){
    $chitiettosave= new Chitietdonhang();
    $Ctdhdata=array();
    $Ctdhdata["soluong"]=$chitieti["soluong"];
    $Ctdhdata["idSanpham"]=$chitieti["idSanpham"];
    $Ctdhdata["mota"]=$chitieti["mota"];
    $chitiettosave->fill($Ctdhdata);
    $saved=$Dh->chitietdonhang()->save($chitiettosave);

  }
  unset($_SESSION["cart"]);
  if($saved){
   echo json_encode(array("mes"=>"success","createdOrderId"=>$Dh->id));
 }else{
   echo json_encode(array("mes"=>"fail"));
 }

}

public function deleteExe(){
  $data = json_decode(file_get_contents('php://input'), true);
  $Order=Donhang::find($data["id"]);
  $Order->chitietdonhang()->delete();
  $deleted=$Order->delete();
  if($deleted){
   echo json_encode(array("mes"=>"success","deletedOrderId"=>$Order->id));
  }else{
   echo json_encode(array("mes"=>"fail"));
  }
}

public function updateShipTimeExe(){
$data = json_decode(file_get_contents('php://input'), true);
$listId=[];
$listId=$data["listId"];
// echo count($data["listId"]);
$shiptime=$data["shiptime"];
  foreach($listId as $idi){
   $orderi= Donhang::find($idi);
   $orderi->thoidiemgiaohang=$shiptime;
   $orderi->save();
 }

}
public function updateStatusExe(){
$data = json_decode(file_get_contents('php://input'), true);
$idi=$data["id"];
$orderi= Donhang::find($idi);
$orderi->tinhtrang=$data["tinhtrang"];
$orderi->thoidiemnhanhang=date("Y-m-d H:i:s");
$orderi->save();

}

}
