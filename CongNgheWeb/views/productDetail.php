<?php $this->layout("layouts/homelayout") ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/cssprofile/productDetail.css">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div id="phonecontent" class="row">
  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 phonecontent__div">
    <div id="slider">
      <div>
        <img class="slidei" src="<?=$this->e($phonei->linkanh1)?>" alt="">
      </div>
      <div>
        <img class="slidei" src="<?=$this->e($phonei->linkanh2)?>" alt="">
      </div>
    </div>


  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 phonecontent__div">
    <div id="buyinfo">
      <p id="pricespan">Giá: <?=$this->e($phonei->Gia)?> đ </p>
      <div class="card">
        <!-- khuyen mai -->
        <div class="card-header">
          Khuyến mãi
        </div>
        <div class="card-body">
          <p class="card-text"><i style="color: blue" class="fa fa-circle" aria-hidden="true"></i> Giảm ngay 300.000 đ</p>
          <p class="card-text"><i style="color: blue" class="fa fa-circle" aria-hidden="true"></i> Hỗ trợ trả góp 0% lãi suất</p>
          <p class="card-text"><i style="color: blue" class="fa fa-circle" aria-hidden="true"></i> Thu cũ đổi mới</p>
        </div>
        <!-- uu dai -->
        <div class="card">
          <div class="card-header">
            Ưu đãi
          </div>



          <div class="card-body">
            <p class="card-text"><i style="color: green" class="fa fa-check" aria-hidden="true"></i> Giao hàng từ 1 đến 2 ngày</p>
            <p class="card-text"><i style="color: green" class="fa fa-check" aria-hidden="true"></i> Bảo hành 12 tháng</p>
          </div>
        </div>
      </div>
      <button id="buybtn">
        MUA NGAY
      </button>

    </div>
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 phonecontent__div">
    <h3>Thông số kỹ thuật</h3>
    </br>
    <table class="table table-striped table-bordered table-light ">
      <tr>
        <td>Kích thước màn hình</td>
        <td><?=$this->e($phonei->ManHinh)?></td>
      </tr>
      <tr>
        <td>Hệ điều hành</td>
        <td><?=$this->e($phonei->HeDieuHanh)?></td>
      </tr>
      <tr>
        <td>Camera Sau</td>
        <td><?=$this->e($phonei->Camera)?> </td>
      </tr>
      <tr>
        <td>Camera Trước</td>
        <td><?=$this->e($phonei->CameraTruoc)?></td>
      </tr>
      <tr>
        <td>RAM</td>
        <td><?=$this->e($phonei->Ram)?></td>
      </tr>
      <tr>
        <td>Bộ nhớ</td>
        <td><?=$this->e($phonei->BoNho)?></td>
      </tr>
      <tr>
        <td>Sim</td>
        <td><?=$this->e($phonei->Sim)?></td>
      </tr>
      <tr>
        <td>Pin</td>
        <td><?=$this->e($phonei->Pin)?></td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        <td><?=$this->e($phonei->Mau1)?> , <?=$this->e($phonei->Mau2)?> </td>
      </tr>
    </table>
  </div>


</div>


<!-- HIDDEN ELEMENT -->
<button id="showCheckLoginModalBtn" style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN TÀI KHOẢN</h5>

      </div>
      <div class="modal-body">
        <p>Bạn cần đăng nhập hoặc tạo tài khoản mới để mua hàng!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary"><a href="/register">Đăng ký mới tại đây</a></button>
        <button type="button" class="btn btn-primary"><a href="/login">Đăng nhập tại đây</a></button>
      </div>
    </div>
  </div>
</div>
<!-- ________________________________________________________________________-->
<!-- Button trigger modal -->
<button id="showBuyModalBtn" type="button" class="btn btn-primary"style="display:none" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade centered" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">ĐẶT HÀNG</h3>
      </div>
        <h5>Điện thoại <?= $this->e($phonei->TenSanpham) ?></h5>
        <form id="buyForm">
      <div id="buyformBody" class="modal-body">

        <span>Giá: </span><span id="pricei" value="<?= $this->e($phonei->Gia)?>"><?= $this->e($phonei->Gia)?></span></br>
        <span>Màu: </span></br>
        <div class="modalbody__item" id="colorArea">

            <input type="radio" name="mamau" value="1">
            <label><?= $this->e($phonei->Mau1)?></label>

            <input type="radio" name="mamau" value="2">
            <label><?= $this->e($phonei->Mau2)?></label>
        </div>

      <label>Số lượng: </label><input id="countinp" name="soluong" type="text" value="1">
        <div class="modalbody__item" id="countarea">
          <button id="upbtn">+</button>
          <button id="downbtn">-</button>
        </div>


        </div>

      <div class="modal-footer">
         <p>Thêm sản phẩm vào giỏ hàng ?</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">HỦY</button>
        <button id="buyFormBtn" type="submit" class="btn btn-primary">OK</button>
      </div>

      <input type="hidden" name="id" value="<?= $this->e($phonei->id)?>">
    </form>
    </div>
  </div>
</div>


<!-- HIDDEN ELEMENT-->
<!-- Check info -->
<?php if (!\App\SessionGuard::isUserLoggedIn()): ?>
<input id="isLoggedMark" style="display:none" type="checkbox">
<?php else: ?>
<input id="isLoggedMark"  style="display:none" type="checkbox" checked="true">
<?php endif ?>

<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
  $('#slider').slick({
    autoplay: true
  });
</script>
<script>
  $("#buybtn").click(function() {

   if ($('#isLoggedMark').is(':checked')) {
      $('#showBuyModalBtn').click();
    } else {

      $('#showCheckLoginModalBtn').click();
}
});

  let count=0;
  let pricei= $("#pricei").text();
  $("#upbtn").click(function(e){
      e.preventDefault();
    count++;
    $("#countinp").val(count) ;
    $("#pricei").text( pricei*count);

  });
  $("#downbtn").click(function(e){
    e.preventDefault();
    count--;
    if(count<1){
       count=1;
    }
    $("#countinp").val(count);
    $("#pricei").text( pricei*count);
  });

  $('#buyFormBtn').click(function (e) {
    e.preventDefault();
    var data = {};
    var formData = $('#buyForm').serializeArray();
    $.each(formData, function (i, v) {
        data[""+v.name+""] = v.value;
    });
   addPhone(data);
    $("#exampleModalCenter").modal('hide');

});
function addPhone(data) {
$.ajax({
        url: "/updCart",
        type: "Post",
        async: true,
        data: JSON.stringify(data),
        success: function (res) {

          setTimeout(function(){
            alert("Cập nhật giỏ hàng thành công");
          }, 1000);
          
        },
        error: function (request, status, error) {
        alert(request.responseText);
       }
    });
}
</script>

<?php $this->stop() ?>
