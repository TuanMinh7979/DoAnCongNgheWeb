<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/home.css">
  <link rel="stylesheet" href="/font/css/font-awesome.min.css">
  <?=$this->section("page_specific_css")?>
</head>
<body>

  <!--header-->
  <nav id="nav1" class="navbar">
    <ul class="nav nav-pills">
      <li id="librand" class="nav-item">
        <a class="navbar-brand" href="#"><img src="/IMG/MobileShop-logoa.png" id="logo" alt=""></a>
      </li>
      <li id="lisearchcate" class="nav-item  inp-item">
        <div class="form-group ">
          <select class="form-control" id="exampleFormControlSelect1">
            <option>All</option>
            <option>Điện Thoại </option>
            <option>Laptop</option>
            <option>Phụ kiện</option>

          </select>
        </div>
      </li>
      <li id="lisearchmain" class="nav-item inp-item">
        <form id="searchmain" class="form-inline my-2 my-lg-0">
          <input style="width: 400px" class="form-control mr-sm-2" type="search" placeholder="Bạn cần tìm gì" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
        </form>
      </li>


      <li id="licart" class="nav-item dropdown hoverdropdown">
        <?php if (\App\SessionGuard::isUserLoggedIn()): ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i id="carticon" style="font-size: 50px" class="fa fa-shopping-cart" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/cart">Xem giỏ </a>
            <a class="dropdown-item" href="/orderHistory">Lịch sử mua hàng</a>

          </div>

        <?php else: ?>
          <a class="nav-link" href="/"><i id="carticon" style="font-size: 50px" onclick="event.preventDefault(); alert('Bạn cần đăng nhập để xem giỏ hàng!')" style="font-size: 50px" class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      <?php endif ?>

      </li>

      <li id="liperson" class="nav-item dropdown hoverdropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown1" role="button" data-toggle="dropdown" >
          <i class="fa fa-user" style="font-size: 30px" id="personicon" aria-hidden="true"></i>
          <?php if (\App\SessionGuard::isUserLoggedIn()): ?>
          <span><?=$this->e(\App\SessionGuard::user()->tentaikhoan)?> </span>
          <?php endif ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <?php if (! \App\SessionGuard::isUserLoggedIn()): ?>
          <a class="dropdown-item" href="/login">Đăng nhập</a>
          <a class="dropdown-item" href="/register">Đăng ký</a>

         <?php elseif(($this->e(\App\SessionGuard::user()->role)=='ad')): ?>
            <a class="dropdown-item" href="/ad">Trang quản trị</a>
          <a class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="/out">Đăng xuất</a>
          <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
        <?php else: ?>
               <a class="dropdown-item" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" href="/out">Đăng xuất</a>
        <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
        <?php endif ?>

        </div>

      </li>
    </ul>

  </nav>

  <nav id="nav2" class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="mainmenu" class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">TRANG CHỦ<span class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ĐIỆN THOẠI
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" href="#">Tất cả</a>
            <a class="dropdown-item" href="#">Iphone</a>
            <a class="dropdown-item" href="#">Samsung</a>
            <a class="dropdown-item" href="#">Oppo</a>
          </div>


        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            LAPTOP
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a class="dropdown-item" href="#">Tất cả</a>
            <a class="dropdown-item" href="#">Dell</a>
            <a class="dropdown-item" href="#">HP</a>
            <a class="dropdown-item" href="#">Asus</a>
          </div>


        </li>

        <li class="nav-item active">
          <a class="nav-link" href="#">KHUYẾN MÃI<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">TIN CÔNG NGHỆ<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>


  </nav>

  <div class="container" id="content">
    </br>
    <?=$this->section("page")?>
  </div>





  <div id="footer" style="background-color:  #DEEEEA; border: 1px solid white">
    <div class="text-center">
      <h5 style="color: blue">CÔNG NGHỆ WEB CT275</h5>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
       2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </div>
  <!--footer-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   $("#liperson>a, #licart>a").click(function(){
      $(this).css({"background-color": "transparent","color": "blue"});


    })


</script>

<?= $this -> section("page_specific_js")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
