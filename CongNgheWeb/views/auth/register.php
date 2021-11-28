<?php $this->layout("layouts/homelayout") ?>
<?php $this->start("page") ?>
<div style="margin:0 auto" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<form  action="/register" style="font-size:1.2rem;" method="post">
  <h2 class="text-center" style="color:orange;font-weight:bold">ĐĂNG KÝ</h2>

  <?php if($mes): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>Đăng ký thành công</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
  </div>
<?php endif ?>

    <div class="form-group">
        <label >Tên tài khoản</label>
        <input type="text" class="form-control"  name="tentaikhoan">
    </div>


    <?php if (isset($errors['tentaikhoan'])): ?>
    <span class="help-block"><strong style="color:red"><?=$this->e($errors['tentaikhoan'])?></strong></span>
    <?php endif ?>

    <div class="form-group">
        <label for="inputPassword">Mật khẩu</label>
        <input type="password" class="form-control"  name="matkhau">
    </div>
    <?php if (isset($errors['matkhau'])): ?>
    <span class="help-block"><strong style="color:red"><?=$this->e($errors['matkhau'])?></strong></span>
    <?php endif ?>

    <div class="form-group">
        <label >Nhập lại Mật khẩu</label>
        <input type="password" class="form-control" name="nhaplaimatkhau">
    </div>
    <?php if (isset($errors['nhaplaimatkhau'])): ?>
    <span class="help-block"><strong style="color:red"><?=$this->e($errors['nhaplaimatkhau'])?></strong></span>
    <?php endif ?>

    <div class="form-group">
        <label >SDT</label>
        <input type="text" class="form-control" name="sdt">
    </div>
    <?php if (isset($errors['sdt'])): ?>
    <span class="help-block"><strong style="color:red"><?=$this->e($errors['sdt'])?></strong></span>
    <?php endif ?>

    <div class="form-group">
        <label >Địa chỉ</label>
        <input type="text" class="form-control" name="diachi">
    </div>
    <?php if (isset($errors['diachi'])): ?>
    <span class="help-block"><strong style="color:red"><?=$this->e($errors['diachi'])?></strong></span>
    <?php endif ?>


    <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>

</div>

<?php $this->stop() ?>
