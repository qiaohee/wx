<?php
error_reporting(0);
date_default_timezone_set('Asia/Shanghai');

//项目路径
$app = "wx";
$appname = "亲子活动";
define("APP_URL","http://wx.seacore.com.cn/web2016/".$app."/index.php");

//分享地址
define("imgUrl","http://wx.seacore.com.cn/web2016/".$app."/static/images/fenxiang.png"); //图片地址
define("lineLink","http://seacore.com.cn/href/web2016/".$app.".html"); //分享地址
define("shareTitle","123"); //标题
define("descContent","123"); //内容

define("appname",$appname); //活动名称
include './SinglePHP.class.php';
$config = array(
    'APP_PATH' => './App/', #APP业务代码文件夹
    //Local
    'DB_HOST'     => '120.76.191.220',    #数据库主机地址
    'DB_PORT'     => 3306,         #数据库端口，默认为3306
    'DB_USER'     => 'haixin',         #数据库用户名
    'DB_PWD'      => 'haixin',         #数据库密码
    'DB_NAME'     => 'haixin_db',    #数据库名
    'DB_CHARSET' => 'utf8', #数据库编码，默认utf8
    'PATH_MOD' => 'NORMAL', #路由方式，支持NORMAL和PATHINFO，默认NORMAL
    'USE_SESSION' => true, #是否开启session，默认false
);
SinglePHP::getInstance($config)->run();