<?php $this->layout("layouts/adminlayout") ?>

<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/adminphone_add_update.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div>
  <h3 id="title" class="text-center">THÊM MỚI SẢN PHẨM</h3>
  <div id="wrapper" style="margin:0 auto">
    <form id="mainform" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
      <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="form-group">
          <label>SẢN PHẨM</label>
          <input type="text" class="form-control" name="TenSanpham">
        </div>

        <div id="cauhinhchitiet" style="display:flex">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
            <div class="form-group">
              <label>HÃNG</label>
              <select class="form-control" id="exampleFormControlSelect1" name="IdThuonghieu">
                <option value="1">Iphone</option>
                <option value="2">Samsung</option>
                <option value="3">Oppo</option>
              </select>
            </div>

            <div style="display:flex; justify-content:space-around">
              <div class="form-group">
                <label>MÀU 3</label>
                <input type="text" style="width:100px" class="form-control" name="Mau1">
              </div>
              <div class="form-group">
                <label>MÀU 2</label>
                <input type="text" style="width:100px" class="form-control" name="Mau2">
              </div>
            </div>

            <div class="form-group">
              <label>MÀN HÌNH</label>
              <input type="text" class="form-control" name="ManHinh">
            </div>
            <div class="form-group">
              <label>CAMERA</label>
              <input type="text" class="form-control" name="Camera">
            </div>
            <div class="form-group">
              <label>CAMERA TRƯỚC</label>
              <input type="text" class="form-control" name="CameraTruoc">
            </div>

            <div class="form-group">
              <label>BỘ NHỚ</label>
              <input type="text" class="form-control" name="BoNho">
            </div>


          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label>HỆ ĐIỀU HÀNH</label>
              <input type="text" class="form-control" name="HeDieuHanh">
            </div>


            <div class="form-group">
              <label>KẾT NỐI</label>
              <select class="form-control" id="exampleFormControlSelect1" name="KetNoi">
                <option>4G</option>
                <option>5G</option>
              </select>
            </div>

            <div class="form-group">
              <label>SIM</label>
              <input type="text" class="form-control" name="Sim">
            </div>

            <div class="form-group">
              <label>PIN</label>
              <input type="text" class="form-control" name="Pin">
            </div>

            <div class="form-group">
              <label>RAM</label>
              <input type="text" class="form-control" name="Ram">
            </div>
          </div>
        </div>

      </div>


      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        <div class="form-group">
          <label>GIÁ BÁN</label>
          <input type="text" class="form-control" name="Gia">
        </div>
        <div class="form-group">
          <label>GIÁ MUA</label>
          <input type="text" class="form-control" name="GiaMua">
        </div>
        <div class="form-group">
          <label>KHO</label>
          <input type="text" class="form-control" name="Kho">
        </div>
      </div>


    </form>

    <div id="imgSection" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

      <label>HÌNH ẢNH</label>
      <div id="imgArea">
        <?php  if(file_exists('Anh/tmpimg1.jpg')):?>
        <img style="width:45%; height:200px; border:1px solid gray" src="/Anh/tmpimg1.jpg" alt="" />

        <?php else: ?>
        <div style="width:45%; height:200px; border:1px solid gray">
          <p>Chưa có ảnh</p>
        </div>
        <?php endif?>
        <?php  if(file_exists('Anh/tmpimg2.jpg')):?>
        <img style="width:45%; height:200px; border:1px solid gray" src="/Anh/tmpimg2.jpg" alt="" />
        <?php else: ?>
        <div style="width:45%; height:200px; border:1px solid gray">
          <p>Chưa có ảnh</p>
        </div>
        <?php endif?>
      </div>

      <div id="selectImgArea">
        <input type="radio" name="imgsel" value="1" checked>
        <label>Ảnh 1</label><br>
        <input type="radio" name="imgsel" value="2">
        <label>Ảnh 2</label><br>

      </div>


      <div>
        <form id="formImg" method="Post" enctype="multipart/form-data">
          <input class="fileinp" type="file" name="image">
          <button name="uploadBtn" value="uploadBtn">Upload</button>
        </form>
      </div>

    </div>

  </div>

  <div class="row">
    <button class="controlBtn" id="submitBtn">THÊM</button>
    <button class="controlBtn" id="redirectBtn"><a href="/ad/getPhone">TRỞ LẠI</a> </button>
  </div>
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script>
  $('#formImg').submit(function(e) {
    e.preventDefault();
    var data1 = new FormData(this);
    let idx = $("input[name='imgsel']:checked").val();
    // console.log(a);

    $.ajax({
      url: "/ad/upload/" + idx,
      type: "Post",
      contentType: false,
      processData: false,
      data: data1,
      success: function(res) {

        window.location.href = "/ad/getPhone/add";
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  });

  $('#submitBtn').click(function(e) {
    e.preventDefault();
    var data = {};
    var formData = $('#mainform').serializeArray();
    $.each(formData, function(i, v) {
      data["" + v.name + ""] = v.value;
    });

    addPhone(data);

  });

  function addPhone(data) {
    $.ajax({
      url: "/ad/getPhone/addApi",
      type: "Post",
      async: true,
      data: JSON.stringify(data),
      success: function(res) {
        console.log(res);
        alert("Đã thêm sản phẩm có id là " + res["mes"]);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
</script>


<?php $this->stop() ?>
