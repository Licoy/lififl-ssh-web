<?php
//启动SESSION会话
session_start();
//引入数据库连接文件
require("../Include/connect.php");
if(isset($_POST['loguseremail']) && isset($_POST['loguserpswd'])){
	//接收POST数据并存为变量
	$email=$_POST['loguseremail'];
	$pswd=$_POST['loguserpswd'];
	foreach($conn->query("SELECT `userEmail` FROM `user` WHERE `userEmail`='".$email."'") as $rowemail){}
	foreach($conn->query("SELECT `userPswd` FROM `user` WHERE `userEmail`='".$email."'") as $rowpswd){}
	foreach($conn->query("SELECT * FROM `user` WHERE `userEmail`='".$email."'") as $row){}
	if(@$rowemail['0'] != $email){
		echo "emailfalse";
	}
	elseif(@$rowpswd['0'] != $pswd){
		echo "pswdfalse";
	}
	elseif($row['status']!=1){
		echo "statfalse";
	}
	else{
		$_SESSION['useremail']=$email;
		$_SESSION['userpswd']=$pswd;
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['userName'];
		$_SESSION['userlevel']=$row['userLevel'];
		echo "true";
	}
	
}
	
	
	
?>