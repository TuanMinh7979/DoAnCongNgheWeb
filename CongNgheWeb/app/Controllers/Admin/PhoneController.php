<?php
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Dienthoai;
class PhoneController extends Controller{
  public function getAll(){
       $this->sendPage('adminview/adminphone', ["adminphoneList" => Dienthoai::all()]);
  }
  public function add(){
    $this->sendPage('adminview/adminphone_add');
  }
  public function handleUploadImg($idx){
    if(isset($_FILES['image'])&&($idx==1)){
      // $imgi = $_FILES['image']['name'];
      $success=move_uploaded_file($_FILES['image']['tmp_name'],"Anh/tmpimg1.jpg");

   }else{
      $success=move_uploaded_file($_FILES['image']['tmp_name'],"Anh/tmpimg2.jpg");
   }

}
  public function update($id){
  $Dti= Dienthoai::find($id);
  $this->sendPage('adminview/adminphone_update',["Dti" => $Dti]);
  }
}
