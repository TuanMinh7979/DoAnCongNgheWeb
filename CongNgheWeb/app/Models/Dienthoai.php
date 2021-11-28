<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Dienthoai extends Model{
public  $timestamps = false;
protected $table ="dienthoai";
protected $fillable = ['TenSanpham', 'Gia','GiaMua', 'Mau1','Mau2', 'ManHinh','BoNho',
'HeDieuHanh','Camera', 'KetNoi','Sim','Pin','IdThuonghieu','CameraTruoc','Ram','linkanh1', 'linkanh2','Kho'];

}

?>
