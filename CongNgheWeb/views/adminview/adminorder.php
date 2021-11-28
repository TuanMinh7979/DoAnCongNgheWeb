<?php $this->layout("layouts/adminlayout") ?>

<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/adminorder.css" rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start("page") ?>
<div style="margin:0 auto; height:1000px">

  </br>
  </br>
  <div class="row">
    <table style="padding: 0px 5px 0px 5px " id="maintable" class="table table-striped ">
      <thead>
        <tr>
          <th style="width:3%">Id</th>
          <th style="width:5%">Status</th>
          <th style="width:7%">Tên KH</th>
          <th style="width:20%">Sản phẩm</th>
          <th style="width:7%">Sdt</th>
          <th style="width:10%">Thành tiền</th>
          <th style="width:10%">Mua lúc</th>
          <th style="width:10%">Giao lúc</th>
          <th style="width:10%">Nhận lúc</th>
          <th style="width:10%">Nơi nhận</th>
          <th style="width:8%"></th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($adminorderList as $orderi): ?>
        <tr>
          <td class="id" style="width:3%"><?= $orderi["id"]?></td>
          <td class="status" style="width:5%"><?= $orderi["tinhtrang"]?></td>
          <td style="width:7%"><?= $orderi["tenkhachhang"]?></td>
          <td style="width:20%">
            <?php foreach($orderi["itemList"] as $itemi): ?>
            <span><?= $itemi["tensanpham"]?>(<span><?= $itemi["mota"]?></span> x</span><?= $itemi["soluong"]?><span>), </span></span>
            <?php endforeach;?>
          </td>
          <td style="width:7%"><?= $orderi["sdtkhachhang"]?></td>
          <td style="width:10%"><?= $orderi["thanhtien"]?></td>
          <td style="width:10%"><?= $orderi["thoidiemdatmua"]?></td>
          <td class="tdgh" style="width:10%"><?= $orderi["thoidiemgiaohang"]?></td>
          <td style="width:10%"><?= $orderi["thoidiemnhanhang"]?></td>
          <td style="width:10%"><?= $orderi["diachinhanhang"]?></td>

          <td style="width:8%">
            <!-- <button class="detailBtn itemi__modify">CHI TIẾT</button> -->
            <button class="cancleBtn itemi__modify delLink">HỦY</button>
            <input class="checkboxs" type="checkbox" name="row-check" id="<?= $orderi["id"]?>">
          </td>
        </tr>

        <?php endforeach; ?>



      </tbody>
    </table>
    <div class="row">
      <form id="setShipTime" method="post">
        <label for="shiptime">Giờ giao sản phẩm :</label>
        <input type="datetime-local" id="datetimeinp" name="shiptime">
        <input type="submit">
      </form>
    </div>
  </div>
</div>



<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>



<script type="text/javascript">
  $(document).ready(function() {
    $(".status").each(function() {
      tr = $(this).closest("tr");
      if ($(this).text() === "Đang mua") {
        $(this).css({
          "color": "#49FF00",
          "font-weight": "bold"
        });
      } else {
        $(this).css({
          "color": "#FF9300",
          "font-weight": "bold"
        });
        delBtn = tr.find(".cancleBtn")
        delBtn.text("Xóa");
        delBtn.css("background-color", "#6166B3")

      }

    });

    $("#maintable").on("click", ".delLink", function(e) {
      e.preventDefault();
      data = {};
      $tri = $(this).closest("tr");
      $idToDel = $tri.find(".id").text();

      data["id"] = $idToDel;
      $(this).closest("tr").remove();
      delOrder(data);
    });

    function delOrder(data) {
      $.ajax({
        url: "/ad/getOrder/deleteApi",
        type: "Post",
        async: true,
        data: JSON.stringify(data),
        success: function(res) {

          alert("Đã hủy đơn hàng có id là " + res["deletedOrderId"]);
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });

    };


  });


  function getIdList() {
    listId = [];
    $(".checkboxs").each(function() {
      if ($(this).is(':checked')) {
        listId.push($(this).attr('id'));
      }
    });
    return listId;
    // console.log(listId);
  }

  $("#setShipTime").submit(function(e) {
    e.preventDefault();
    var data1 = {};
    var listId = [];
    listId = getIdList();
    data1["listId"] = listId;
    var formData = $(this).serializeArray();
    $.each(formData, function(i, v) {
      data1["" + v.name + ""] = v.value;
    });
    setTimeship(data1);

  });

  function setTimeship(inpdata) {
    $.ajax({
      url: "/ad/getOrder/setShipTime",
      type: "Post",
      async: true,
      data: JSON.stringify(inpdata),
      success: function(res) {
        window.location.href = "/ad/getOrder";
      },
      error: function(request, status, error) {
        window.location.href = "/ad/getOrder";
      }
    });

  }
</script>
<?php $this->stop() ?>
