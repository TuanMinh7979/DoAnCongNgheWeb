
<?php $this->layout("layouts/homelayout") ?>

<?php $this->start("page_specific_css") ?>
    <link href="/cssprofile/homedata_css.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>

<div style="border-bottom: 1px solid blue" class="row contentrow" id="filter">
  <h3>BỘ LỌC</h3>
</div>
<div id="productlist" class="row contentrow">
<?php foreach($homephoneList as $phonei): ?>
        <div  class="col-xs-12 col-sm-12 col-md-4 col-lg-2 productlistItem" >
          <img class="productlistItem_Img" src="<?=$this->e($phonei->linkanh1)?>" class="card-img-top" alt="" >
        <div class="infoFooter">
          <div>
            <h6 class="productlistItem__name"><?=$this->e($phonei->TenSanpham)?></h6>
            <h6 class="productlistItem__price"><?=$this->e($phonei->Gia)?><span>đ</span></h6>
              </div>

            <a href="/phone/<?=$this->e($phonei->id)?>" class="btn btn-primary">Chi tiết</a>
            </div>

        </div>

  <?php endforeach; ?>
</div>
<?php $this->stop()?>
