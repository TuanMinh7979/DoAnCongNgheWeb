<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Donhang extends Model{
public  $timestamps = false;
protected $table ="donhang1";
// protected $fillable=["tinhtrang", "diachinhanhang","thanhtien","idKhachhang"];
protected $fillable=["tinhtrang", "diachinhanhang","thanhtien","idKhachhang","thoidiemdatmua","thoidiemgiaohang", "thoidiemnhanhang"];

public function chitietdonhang(){
  // return $this->hasMany(Chitietdonhang::class, "idDonhang","id");
  return $this->hasMany(Chitietdonhang::class, "idDonhang");
}




}


?>
