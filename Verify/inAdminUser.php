<?php
//引入数据库连接文件
require("../Include/connect.php");
//引入函数文件
require("../Include/function.php");
if(isset($_POST['reusername']) && isset($_POST['reuserpswd']) && isset($_POST['reuseremail'])){
	//接收POST数据并存为变量
	ini_set('date.timezone', 'Asia/Shanghai');
	$name=$_POST['reusername'];
	$pswd=$_POST['reuserpswd'];
	$email=$_POST['reuseremail'];
	$tokenStr=$name.$pswd.$email;
	$token=md5($tokenStr);
	$tokenPeriod=time()+(60*60*24);
	@$insert=$conn->exec("INSERT INTO `user`(`userName`,`userEmail`,`userPswd`,`regDate`,`token`,`tokenPeriod`,`status`,`userLevel`) 
							VALUES ('".$name."','".$email."','".$pswd."',".time().",'".$token."','".$tokenPeriod."',1,1)");
		if($insert){
			echo "true";
			saveFile("../Install/install.lock","installLock");
			saveFile("../Install/installLock.html",'<!DOCTYPE html>
				<html>
					<head>
						<meta charset="UTF-8">
						<title>安装已经锁定</title>
					</head>
					<body>
					<center><p>安装目录已经锁定，若需要重新安装请删除install/install.lock</p></center>
					</body>
				</html>');
		}
		else{
			echo "false";
		}
	
}
	
	
	
?>