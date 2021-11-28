<?php $this->layout("layouts/homelayout") ?>
<?php $this->start("page") ?>
<div style="margin:0 auto" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<form  action="/login" style="font-size:1.2rem;" method="post">
  <h2 class="text-center"  style="color:#009DAE;font-weight:bold" >ĐĂNG NHẬP</h2>

    <div class="form-group  ?>">
        <label for="inputEmail">Tên tài khoản</label>
    </div>
    <input type="text" class="form-control" id="inputEmail" placeholder="" name="tentaikhoan"
    value="<?=isset($old["tentaikhoan"]) ? $this->e($old["tentaikhoan"]): ' ' ?>" >

    <?php if (isset($errors['tentaikhoan'])): ?>
                                  <span class="help-block">
                                      <strong style="color:red"><?=$this->e($errors['tentaikhoan'])?></strong>
                                  </span>
                              <?php endif ?>
    <div class="form-group">
        <label for="inputPassword">Mật khẩu</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="" name="matkhau">
    </div>
    <?php if (isset($errors['matkhau'])): ?>
                                  <span class="help-block">
                                      <strong style="color:red"><?=$this->e($errors['matkhau'])?></strong>
                                    </span>
                              <?php endif ?>


    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>

</div>

<?php $this->stop() ?>
