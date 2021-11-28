<?php
namespace App\Controllers;
use App\Models\Dienthoai;
use App\Models\User;
use App\Models\Donhang;
use App\Models\Chitietdonhang;
class HomeController extends Controller{
  public function index()
   {
 $this->sendPage('home', ["homephoneList" => Dienthoai::all()]);
  }
  public function showProductDetail($id){
  $this->sendPage('productDetail',["phonei"=> Dienthoai::find($id)]);

  }
  public function updCartExe(){
    $data = json_decode(file_get_contents('php://input'), true);
    array_push($_SESSION['cart'],$data);

  }
  public function showCartInfo(){

     $listinfo= $_SESSION["cart"];
     $userid= $_SESSION["user_id"];
     $userinfo=User::find($userid);
    if(count($listinfo)>0){
     $listproduct=[];
     foreach($listinfo as $key => $infoi){
       $mamau=$infoi["mamau"];
       $producti=Dienthoai::find($infoi["id"]);
       $producti["soluong"]=$infoi["soluong"];
       $producti["mauduocchon"]=$producti["Mau".$mamau];
       $producti["anhduocchon"]=$producti["linkanh".$mamau];
       array_push($listproduct, $producti);
     }
       $this->sendPage('cart',["listproduct"=>$listproduct, "user"=>$userinfo]);
     }else{
        $this->sendPage('notthingincart');
     }
  }

  public function delEleFromSession(){
    $data = json_decode(file_get_contents('php://input'), true);
    $iddel=$data["idToDel"];
    $listincart=$_SESSION["cart"];
    $idxtodel=0;
    for($i=0;$i<count($listincart); $i++){
      if($listincart[$i]["id"]==$iddel){
          $idxtodel=$i;
      }
    }
    unset($_SESSION["cart"][$idxtodel]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);

    //xoa san pham trong session
  }

  public function showOrderHistory(){
     $userid= $_SESSION["user_id"];
     $userinfo=User::find($userid);
     $orders=Donhang::where("idKhachhang",$userinfo["id"])->get();
     $rs=[];
     foreach($orders as $order){
     $order["itemList"]=$order->chitietdonhang()->get();
      foreach($order["itemList"] as $orderItemi){
        $id=$orderItemi["idSanpham"];
        $orderItemi["tensanpham"]=Dienthoai::find($orderItemi["idSanpham"])->TenSanpham;
      }
     }

      $this->sendPage('orderHistory',["orderList"=> $orders]);

  }

}



?>
