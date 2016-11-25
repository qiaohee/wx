<?php
$data = array(
    'title' => appname,
);
View::tplInclude('Public/header', $data); ?>
<!--内容-->


<!--内容结束-->
<?php
$data = array(
    'signPackage' => $signPackage,
    'onMenuShare' => $onMenuShare,
);
View::tplInclude('Public/footer',$data); ?>



