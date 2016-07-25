<?php
require("../Include/connect.php");
//只修改邮箱
if(isset($_POST['useremail']) && isset($_POST['id'])){
	$email=$_POST['useremail'];
	$id=$_POST['id'];
	foreach($conn->query("SELECT `userEmail` FROM `user` WHERE `userEmail`='".$email."'") as $useremail){}
	if(@$useremail['0']==$email){
		echo "emailfalse";
	}
	else{
		$up=$conn->exec("UPDATE `user` SET `userEmail`='".$email."' WHERE `id`=".$id."");
		if($up){
			echo "true";
		}
		else{
			echo "false";
		}
	}

}
?>