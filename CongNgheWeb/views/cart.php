<?php $this->layout("layouts/homelayout") ?>

<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/cart.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>

<h2 class="text-center titletext">GIỎ HÀNG</h2>

<div  id="maincontent">

  <div class="table-responsive col-8 cart__content ">
    <table id="maintable" class="table ">

      <thead>
        <tr>
          <th class="text-center"> </th>
          <th  class="text-center">Sản phẩm</th>
          <th  class="text-center">Màu sắc</th>
          <th  class="text-center">Số lượng</th>
          <th  class="text-center">Đơn giá</th>
          <th  class="text-center">Giá</th>
          <th> </th>
        </tr>
      </thead>
      <tbody id="maintableBody" >
        <?php foreach ($listproduct as $producti): ?>
        <tr >
          <td><img class="proImg" src="<?= $producti["anhduocchon"]?>" /> </td>
          <td><?= $producti["TenSanpham"]?></td>
          <td class="text-left mausaci"><?= $producti["mauduocchon"]?></td>
          <td class="text-left soluongi"><?=$producti["soluong"]?></td>
          <td class="text-left"><?= $producti["Gia"] ?><span>Đ</span></td>
          <td class="pricei text-left"><?= $producti["Gia"]*$producti["soluong"] ?><span>Đ</span></td>
          <td class="text-left"><button class="btn btn-sm btn-danger delRowBtn"><i class="fa fa-trash"></i> </button> </td>
          <input class="productIdi" type="hidden" value="<?= $producti['id'] ?>" >
        </tr>
        <?php endforeach?>

      </tbody>


  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>


      <td><strong>Tổng: </strong></td>
      <td class="text-right"><strong id="sumprice"></strong><span>Đ</span></td>
      <td></td>

    </tr>
  </tfoot>

    </table>
  </div>

  <div id="forminfo" class="card col4 ">
      <div id="headerinfo" class="card-header">
        <h3>THÔNG TIN KHÁCH HÀNG</h3>
      </div>
      <div class="card-body">
        <p>Anh/chị: <?= $this->e($user->tentaikhoan)?></p>
        Địa chỉ: <p id="cur_diachi"><?= $this->e($user->diachi)?> </p>
        <p>SDT: <?= $this->e($user->sdt)?></p>
      </div>
      <button id="orderBtn">ĐẶT MUA</button>
      <input id="inp_idKh" type="hidden" value="<?= $this->e($user->id)?>">




    </div>
</div>



<?php $this->stop()?>

<?php $this->start("page_specific_js") ?>

<script>
  sumprice();


  $("#maintable").on("click", ".delRowBtn", function(e) {
    e.preventDefault();


      $tri = $(this).closest("tr");
      $idx=$tri.find(".productIdi").val();
      delEleFromSession($idx);
      console.log($idx);

      $(this).closest("tr").remove();
      sumprice();

  });

  function sumprice() {
    sum = 0;
    $(".pricei").each(function() {
      sum += parseInt($(this).text());

    });
    $("#sumprice").text(sum );
  }


  function delEleFromSession(idx) {
    data = {};
    data["idToDel"] = idx;

    $.ajax({
      url: "/delInCart",

      type: "Post",
      async: true,
      data: JSON.stringify(data),
      success: function(req) {

      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });

  }
  function getInfoOrder(){
    let listobject=[];

    $('#maintableBody tr').each(function() {
    let current={};
    current["idSanpham"]= $(this).find(".productIdi").val();
    current["soluong"]= $(this).find(".soluongi").text();
    current["mota"]= $(this).find(".mausaci").text();
    listobject.push(current);

   });
   return listobject;
  }

  $("#orderBtn").click(function() {
    data={};
    data["diachinhanhang"]=$("#cur_diachi").text();
    data["idKhachhang"]=$("#inp_idKh").val();
    data["thanhtien"]=$("#sumprice").text();
    data["chitietdonhang"]=getInfoOrder();
    console.log(data);
    console.log(JSON.stringify(data));

    $.ajax({
      url: "/order",
      type: "Post",
      async: true,
      data: JSON.stringify(data),
      success: function(req) {
         alert("Đặt mua thành công");
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
   });



  });
</script>
<?php $this->stop()?>
