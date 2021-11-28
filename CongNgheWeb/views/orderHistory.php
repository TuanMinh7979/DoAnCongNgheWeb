<?php $this->layout("layouts/homelayout") ?>

<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/orderHistory.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="table-responsive col-10" style="margin: auto">
  <table  class="table" id="maintable">
    <h3 class="text-center titletext" > LỊCH SỬ ĐƠN HÀNG</h3>
    <thead>
      <tr>

        <th style="width:10%" >Mã đơn </th>
        <th style="width:10%" >Tình trạng</th>
        <th   >Sản phẩm</th>
        <th style="width:10%" >Thành tiền</th>
        <th style="width:15%" >Thời điểm đặt hàng</th>
        <th style="width:15%" >Địa chỉ nhận hàng</th>
        <th style="width:10%"></th>


      </tr>
    </thead>
    <tbody id="" >
      <?php foreach ($orderList as $orderListi): ?>
      <tr >
        <td class="ids" id="<?= $orderListi->id?>" style="width:10%">###<?= $orderListi->id?> </td>
        <td style="width:10%" class="tinhtrang"><?= $orderListi->tinhtrang?></td>
        <td>
          <?php foreach ($orderListi["itemList"] as $itemi): ?>
            <span><?= $itemi["tensanpham"]?> <span>(x</span><?= $itemi["soluong"]?><span>), </span></span>
          <?php endforeach?>
        </td>
        <td  style="width:10%"><?= $orderListi->thanhtien?></td>
        <td style="width:15%"><?= $orderListi->thoidiemdatmua?></td>
        <td style="width:15%"><?= $orderListi->diachinhanhang?></td>
        <td style="width:10%"><button class="orderSuccessBtn">HOÀN TẤT</button></td>

      </tr>
      <?php endforeach?>

    </tbody>
  </table>
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script>
$( document ).ready(function() {
  $(".tinhtrang").each(function(){
    tri = $(this).closest("tr");
    successBtn=tri.find(".orderSuccessBtn");

    if($(this).text()==="Đang mua"){
    $(this).css({"color": "#49FF00", "font-weight":"bold"});
     }else{
      $(this).css({"color": "#FF9300","font-weight":"bold"});
       successBtn.css("background-color"," #dddddd");
       successBtn.click(function(){
         alert("Đơn hàng đã hoàn tất");
       })
    }

  });
});


$("#maintable").on("click", ".orderSuccessBtn", function(e) {
  e.preventDefault();
  data1={};
  tri = $(this).closest("tr");
  id=tri.find(".ids").attr('id');
  data1["id"]=id;
  data1["tinhtrang"]="Hoàn tất";

  console.log(data1);
  $.ajax({
           url: "/ad/getOrder/setStatus",
           type: "Post",
           async: true,
           data: JSON.stringify(data1),
           success: function (res) {
            window.location.href =  "/orderHistory";
        },
           error: function (request, status, error) {
           window.location.href =  "/orderHistory";
          }
       });

});

</script>
<?php $this->stop()?>
