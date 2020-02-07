<?php
//获取请求参数
$name = $_POST["name"];
$phoneNumber = $_POST["phonenumber"];
$password = $_POST["password"];
$passwordAgain = $_POST["passwordAgain"];
//判断手机号是否合法
if(strlen($phone)!=11){
	echo "请输入正确的手机号！";
}
else{
	//连接数据库
	$con_id = mysql_connect("127.0.0.1:3306","root","9D9f30d9dd78") or die("连接数据库失败:".mysql_error());
	//设置编码方式
	mysql_query("SET NAMES UTF8");
	//打开数据库
	mysql_select_db(akuaDB, $con_id) or die("打开数据库失败:".mysql_error());
	//判断手机号是否重复注册
	$sql = 'select * from t_believer where b_phonenumber = "$phoneNumber"';
	$sql_res = mysql_query($sql);
	if(mysql_num_rows($sql_res) != 0){
		echo "手机号已被注册！";
	}
	else{
		if($password!=$passwordAgain){
			echo "两次输入的密码不一样！";
		}
		else{
			//执行sql语句
			$sql = 'insert into t_believer (b_name,b_phonenumber,b_password) values("$name","$phone","$password")';
			$sql_res = mysql_query($sql);
			if($sql_res){
				echo "你已经是阿库娅信徒啦！";
			}
			else{
				echo "阿库娅在青蛙嘴里！请稍后再试！";
			}
		}
	}
}
?>