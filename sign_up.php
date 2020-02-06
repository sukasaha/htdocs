<?php
//获取请求参数
$name = $_POST["name"];
$phone = $_POST["phone"];
$password = $_POST["password"];
//连接数据库
$con_id = mysql_connect("127.0.0.1:3306","root","9D9f30d9dd78") or die("连接数据库失败:".mysql_error());
//设置编码方式
mysql_query("SET NAMES UTF8");
//打开数据库
mysql_select_db(akuaDB, $con_id) or die("打开数据库失败:".mysql_error());
//执行sql语句
$sql = "insert into t_believer (b_name,b_phonenumber,b_password) values("$name","$phone","$password")";
$sql_res = mysql_query($sql);
var_dump($sql_res);

?>