<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Chitietdonhang extends Model{
public  $timestamps = false;
protected $table ="chitiet_donhang";
// protected $fillable=["soluong", "idDonhang","idSanpham","mota"];
protected $fillable=["soluong","idSanpham","mota","idDonhang"];

public function donhang(){
  // return $this->belongsTo(Donhang::class,"id","idDonhang");
  return $this->belongsTo(Donhang::class);
}
}


?>
