<?php
namespace App\RestApi;
use App\Models\Dienthoai;

class PhoneApi extends BaseApi{
 public function createExe(){
   // $lasted_id = Dienthoai::latest('id')->id;
   $lastedPhone = Dienthoai::latest('id')->first();
    $lasted_id =$lastedPhone->id;
   $data = json_decode(file_get_contents('php://input'), true);
   $nextid=$lasted_id+1;
   $data["linkanh1"]="/Anh/".$nextid."_1.jpg";
   $data["linkanh2"]="/Anh/".$nextid."_2.jpg";
   renamefile("/Anh/tmpimg1.jpg","/Anh/".$nextid."_1.jpg");
   renamefile("/Anh/tmpimg2.jpg","/Anh/".$nextid."_2.jpg");

   $Dt= new DienThoai();
   $Dt->fill($data);
   $saved = $Dt->save();
   if($saved){
     echo json_encode(array("mes"=>"success","createdPhoneId"=>$Dt->id));
  }else{
    echo json_encode(array("mes"=>"fail"));
  }
}


  public function updateExe(){
    $data = json_decode(file_get_contents('php://input'), true);
    $Dt=Dienthoai::find($data["id"]);
    $id=$Dt->id;
    //neu khong duoc thi ta xoa anh tai day
    renamefile("/Anh/tmpimg1.jpg","/Anh/".$id."_1.jpg");
    renamefile("/Anh/tmpimg2.jpg","/Anh/".$id."_2.jpg");

    $Dt->fill($data);
    $saved = $Dt->save();
    if($saved){
     echo json_encode(array("mes"=>"success","updatedPhoneId"=>$Dt->id));
   }else{
     echo json_encode(array("mes"=>"fail"));
   }
 }


  public function deleteExe(){
  $data = json_decode(file_get_contents('php://input'), true);
  $Dt=Dienthoai::find($data["id"]);
  $deleted=$Dt->delete();
  if($deleted){
   echo json_encode(array("mes"=>"success","deletedPhoneId"=>$Dt->id));
  }else{
   echo json_encode(array("mes"=>"fail"));
  }
  }

}
?>
