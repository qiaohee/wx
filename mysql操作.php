<?php
//项目地址
//git clone https://github.com/qiaohee/wx.git

//$db = M();  //获取数据库对象，前提是在入口文件配好数据库相关的配置

//防止sql注入
//$name = $db->escape($_GET['name']);  //转义字符

//查询，失败返回false，否则返回数据
//$ret = $db->query("select * from user where name = '$name'");
//echo $db->getRows();  //获得返回的行数
//echo $db->getLastSql();  //获得上一次执行的sql

//执行增删改语句，失败返回false，否则返回影响的行数
//$count = $db->execute("insert user (name, email) values ('leo108', 'leo108@qq.com')");
//echo $db->getRows();  //获得返回的行数
//echo $db->getInsertId();  //获得自增ID
//echo $db->getError();  //如果执行sql失败，可以获得失败原因

//打印
$this->dump();