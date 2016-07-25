<?php
//引入数据库连接文件
require("../Include/connect.php");
if(isset($_POST['forgotemail'])){
	//接收POST数据并存为变量
	$email=$_POST['forgotemail'];
	foreach($conn->query("SELECT `userEmail` FROM `user` WHERE `userEmail`='".$email."'") as $row){}
	if(@$row['0'] != $email){
		echo "emailfalse";
	}
	else{
		echo "true";
	}
	
}
	
	
	
?>