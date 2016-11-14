<?php
$data = array(
    'title' => $title,
);
View::tplInclude('Public/header', $data); ?>
<div class="put_body">
    <a href="#" class="put_back"></a>
    <input type="text" placeholder="餐厅名字..." class="put_in put_name">
    <input type="text" placeholder="餐厅地址..." class="put_in put_add">
    <textarea name="" id="" cols="30" rows="10" placeholder="对餐厅的简单介绍..."></textarea>
    <div class="put_box one">
        <p>上传封面</p>
        <div><img src="static/images/003_04.png" alt=""></div>
        <input type="file">
    </div>
    <div class="put_box two">
        <p>上传照片</p>
        <div><img src="static/images/003_04.png" alt=""></div>
        <input type="file">
        <p class="two_bto">（最多上传6张照片）</p>
    </div>
    <input type="button" value="" class="put_btn">
</div>
<?php
$data = array(
    'signPackage' => $signPackage,
    'onMenuShare' => $onMenuShare,
);
View::tplInclude('Public/footer',$data); ?>



