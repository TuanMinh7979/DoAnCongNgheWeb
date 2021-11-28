<?php $this->layout("layouts/adminlayout") ?>


<?php $this->start("page_specific_css") ?>
<link href="/cssprofile/adminphone_add_update.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>

  <div>
    <h3 id="title" class="text-center">CẬP NHẬT SẢN PHẨM</h3>
    <div id="wrapper" style="margin:0 auto">
      <form id="mainform" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
          <div class="form-group">
            <label>SẢN PHẨM</label>
            <input type="text" class="form-control" name="TenSanpham" value="<?= $this->e($Dti->TenSanpham)?>">
          </div>

          <div id="cauhinhchitiet" style="display:flex">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
              <div class="form-group">
                <label>HÃNG</label>
                <select class="form-control" id="exampleFormControlSelect1" value="<?= $this->e($Dti->IdThuonghieu)?>" name="IdThuonghieu">
                  <option value="1">Iphone</option>
                  <option value="2">Samsung</option>
                  <option value="3">Oppo</option>
                </select>
              </div>

              <div style="display:flex; justify-content:space-around">
                <div class="form-group">
                  <label>MÀU 3</label>
                  <input type="text" style="width:100px" class="form-control" name="Mau1" value="<?= $this->e($Dti->Mau1)?>">
                </div>
                <div class="form-group">
                  <label>MÀU 2</label>
                  <input type="text" style="width:100px" class="form-control" name="Mau2" value="<?= $this->e($Dti->Mau2)?>">
                </div>
              </div>

              <div class="form-group">
                <label>MÀN HÌNH</label>
                <input type="text" class="form-control" name="ManHinh" value="<?= $this->e($Dti->ManHinh)?>">
              </div>
              <div class="form-group">
                <label>CAMERA</label>
                <input type="text" class="form-control" name="Camera" value="<?= $this->e($Dti->Camera)?>">
              </div>
              <div class="form-group">
                <label>CAMERA TRƯỚC</label>
                <input type="text" class="form-control" name="CameraTruoc" value="<?= $this->e($Dti->CameraTruoc)?>">
              </div>

              <div class="form-group">
                <label>BỘ NHỚ</label>
                <input type="text" class="form-control" name="BoNho" value="<?= $this->e($Dti->BoNho)?>">
              </div>


            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label>HỆ ĐIỀU HÀNH</label>
                <input type="text" class="form-control" name="HeDieuHanh" value="<?= $this->e($Dti->HeDieuHanh)?>">
              </div>


              <div class="form-group">
                <label>KẾT NỐI</label>
                <select class="form-control" id="exampleFormControlSelect1" name="KetNoi" value="<?= $this->e($Dti->KetNoi)?>">
                  <option>4G</option>
                  <option>5G</option>
                </select>
              </div>

              <div class="form-group">
                <label>SIM</label>
                <input type="text" class="form-control" name="Sim" value="<?= $this->e($Dti->Sim)?>">
              </div>

              <div class="form-group">
                <label>PIN</label>
                <input type="text" class="form-control" name="Pin" value="<?= $this->e($Dti->Pin)?>">
              </div>

              <div class="form-group">
                <label>RAM</label>
                <input type="text" class="form-control" name="Ram" value="<?= $this->e($Dti->Ram)?>">
              </div>
            </div>
          </div>

        </div>


        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

          <div class="form-group">
            <label>GIÁ BÁN</label>
            <input type="text" class="form-control" name="Gia" value="<?= $this->e($Dti->Gia)?>">
          </div>
          <div class="form-group">
            <label>GIÁ MUA</label>
            <input type="text" class="form-control" name="GiaMua" value="<?= $this->e($Dti->GiaMua)?>">
          </div>
          <div class="form-group">
            <label>KHO</label>
            <input type="text" class="form-control" name="Kho" value="<?= $this->e($Dti->Kho)?>">
          </div>
        </div>
        <input type="hidden" id="inpDtId" name="id" value="<?= $this->e($Dti->id)?>">


      </form>

      <div id="imgSection" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        <label>HÌNH ẢNH</label>
        <div id="imgArea">
          <?php  if(file_exists('Anh/tmpimg1.jpg')):?>
          <img style="width:45%; height:200px; border:1px solid gray" src="/Anh/tmpimg1.jpg" alt="" />
          <?php else: ?>
          <img style="width:45%; height:200px; border:1px solid gray" src="<?= $this->e($Dti->linkanh1)?>" alt="" />
          <?php endif?>
          <?php  if(file_exists('Anh/tmpimg2.jpg')):?>
          <img style="width:45%; height:200px; border:1px solid gray" src="/Anh/tmpimg2.jpg" alt="" />
          <?php else: ?>
          <img style="width:45%; height:200px; border:1px solid gray" src="<?= $this->e($Dti->linkanh2)?>" alt="" />
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
      <button class="controlBtn" id="submitBtn">CẬP NHẬT</button>
      <button class="controlBtn" id="redirectBtn"><a href="/ad/getPhone">TRỞ LẠI</a> </button>
    </div>
  </div>

  <?php $this->stop() ?>

  <?php $this->start("page_specific_js") ?>


  <script>
  //XU LY UPLOAD HINH ANH
  $('#formImg').submit(function(e) {
    e.preventDefault();
    let DtId= $('#inpDtId').val();
    let data1 = new FormData(this);
    let idx = $("input[name='imgsel']:checked").val();
    let recUrl="/ad/getPhone/update/"+DtId;

    $.ajax({
      url: "/ad/upload/" + idx,
      type: "Post",
      contentType: false,
      processData: false,
      data: data1,
      success: function(res) {

        window.location.href = recUrl;
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  });
  //
$('#submitBtn').click(function (e) {
        e.preventDefault();
        var data = {};
        var formData = $('#mainform').serializeArray();
        $.each(formData, function (i, v) {
            data[""+v.name+""] = v.value;
        });
       upPhone(data);

    });

  function upPhone(data) {

    $.ajax({
            url: "/ad/getPhone/updateApi",

            type: "Post",
            async: true,
            data: JSON.stringify(data),
            success: function (res) {
               alert("Đã cập nhật sản phẩm có id là "+res["updatedPhoneId"]);
            },
            error: function (request, status, error) {
            alert(request.responseText);
           }
        });
    }

</script>


  <?php $this->stop() ?>
