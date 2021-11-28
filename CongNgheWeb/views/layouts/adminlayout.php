<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/adminlayout.css">
  <link rel="stylesheet" href="/font/css/font-awesome.min.css">
  <?=$this->section("page_specific_css")?>

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <img src="/IMG/MobileShop-logoa.png" id="logo" alt="">
      </div>

      <ul id="mainmenu" class="list-unstyled ">

        <li class="item">
          <a href="/ad/getPhone">SẢN PHẨM</a>
        </li>
        <li class="item">
          <a href="/ad/getOrder">ĐƠN HÀNG</a>
        </li>
      </ul>
    </nav>
    <div id="content">
      <h3 style="color:blue"> TRANG QUẢN TRỊ</h3>
      <button style="position:absolute; right:20px"><a href="/">Về trang chủ</a></button>
      </br>
      </br>

      <div id="maincontent">
        <?=$this->section("page")?>

      </div>
    </div>

  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?= $this -> section("page_specific_js")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>
