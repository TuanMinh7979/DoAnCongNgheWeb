<?php $this->layout("layouts/adminlayout") ?>

<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/adminphone.css" rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start("page") ?>
<div style="margin:0 auto">
    <button id="addBtn"class="controlBtn"><a href="/ad/getPhone/add" id="addLink">THÊM MỚI</button>
</br>
</br>
<div class="row"><table id="maintable" class="table table-striped ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Ảnh</th>
      <th>Sản phẩm</th>
      <th>Giá mua vào</th>
      <th>Giá bán ra</th>
      <th>Sẵn có</th>
      <th>Tùy chỉnh</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($adminphoneList as $phonei): ?>
              <tr>
              <td class="productId"><?= $phonei["id"]?></td>
              <td><img style="width:60px;height:60px"src="<?= $phonei["linkanh1"]?>" alt=""></td>
              <td><?= $phonei["TenSanpham"]?></td>
              <td><?= $phonei["GiaMua"]?></td>
              <td><?= $phonei["Gia"]?></td>
              <td><?= $phonei["Kho"]?></td>
              <td>
                <a class="itemi__modify" href="/ad/getPhone/update/<?= $phonei['id']?>"><i style="font-size:40px"class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="itemi__modify delLink" href=""><i style="font-size:40px"class="fa fa-trash"></i></a>
              </td>
              </tr>

      <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script type="text/javascript">
$(document).ready(function(){

$("#maintable").on("click", ".delLink", function(e) {
  e.preventDefault();
    let data={};
    $tri = $(this).closest("tr");
    $idToDel=$tri.find(".productId").text();

    data["id"]=$idToDel;
    delPhone(data);
    $(this).closest("tr").remove();

});
function delPhone(data) {
 $.ajax({
          url: "/ad/getPhone/deleteApi",
          type: "Post",
          async: true,
          data: JSON.stringify(data),
          success: function (res) {

             alert("Đã xóa sản phẩm có id là "+res["deletedPhoneId"]);
          },
          error: function (request, status, error) {
          alert(request.responseText);
         }
      });
  }
});
</script>


<?php $this->stop() ?>
