<?php
define('ROOTDIR', realpath(dirname(__DIR__)) . DIRECTORY_SEPARATOR);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ROOTDIR.'vendor/autoload.php';
//req config sau khi req autoload
require_once ROOTDIR.'config/db_config.php';

session_start();
if(!isset($_SESSION["cart"])){
   $_SESSION["cart"]=array();

}
date_default_timezone_set("Asia/Ho_Chi_Minh");

//Router tren trang chu
use NoahBuscher\Macaw\Macaw as Router;
//HOME PAGE ROUTER
Router::get('/',"\App\Controllers\HomeController@index");
Router::get('/login',"\App\Controllers\LoginController@showLoginForm");
Router::post('/login',"\App\Controllers\LoginController@loginExe");
Router::post('/logout', '\App\Controllers\LoginController@logoutExe');

Router::get('/phone/(:num)',"\App\Controllers\HomeController@showProductDetail");

Router::get('/register',"\App\Controllers\RegisterController@showRegisterForm");
Router::post('/register',"\App\Controllers\RegisterController@registerExe");

Router::post('/updCart',"\App\Controllers\HomeController@updCartExe");
Router::post('/delInCart',"\App\Controllers\HomeController@delEleFromSession");

Router::get('/cart',"\App\Controllers\HomeController@showCartInfo");
Router::get('/orderHistory',"\App\Controllers\HomeController@showOrderHistory");


Router::post('/order',"\App\RestApi\DonhangApi@createExe");
//ADMIN PAGE ROUTER
Router::get('/ad',"\App\Controllers\Admin\AdminController@showAdminView");
//_______PHONE
Router::get('/ad/getPhone', "\App\Controllers\Admin\PhoneController@getAll");
Router::post('/ad/upload/(:num)', "\App\Controllers\Admin\PhoneController@handleUploadImg");
//Them
Router::get('/ad/getPhone/add', "\App\Controllers\Admin\PhoneController@add");
Router::post('/ad/getPhone/addApi', "\App\RestApi\PhoneApi@createExe");
//Cap nhat
Router::get('/ad/getPhone/update/(:num)', "\App\Controllers\Admin\PhoneController@update");
Router::post('/ad/getPhone/updateApi', "\App\RestApi\PhoneApi@updateExe");
//Xoa
Router::post('/ad/getPhone/deleteApi', "\App\RestApi\PhoneApi@deleteExe");
//________ORDER
Router::get('/ad/getOrder', "\App\Controllers\Admin\OrderController@getAll");
//Xoa
Router::post('/ad/getOrder/deleteApi', "\App\RestApi\DonHangApi@deleteExe");
//Cap nhat
Router::post('/ad/getOrder/setShipTime', "\App\RestApi\DonHangApi@updateShipTimeExe");
Router::post('/ad/getOrder/setStatus', "\App\RestApi\DonHangApi@updateStatusExe");


Router::error('\App\Controllers\Controller@showNotFound');

Router::dispatch();




?>
