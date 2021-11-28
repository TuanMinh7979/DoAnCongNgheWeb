<?php
namespace App\RestApi;
use App\SessionGuard as Guard;
class BaseApi{
public function __construct() {
  //luon luon tra ve json
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
    
}

}
