<?php
require("../Include/connect.php");
if(isset($_POST['name']) && isset($_POST['qq']) && isset($_POST['phone']) && isset($_POST['idcard'])
	&& isset($_POST['id']) ){
	$name=$_POST['name'];
	$qq=$_POST['qq'];
	$phone=$_POST['phone'];
	$idcard=$_POST['idcard'];
	$id=$_POST['id'];
	foreach($conn->query("SELECT `idCard` FROM `certion` WHERE `idCard`='".$idcard."'") as $scard){}
	foreach($conn->query("SELECT `uid` FROM `certion` WHERE `uid`=".$id."") as $sid){}
	if(@!$sid){
		if(@$scard['0']!=$idcard){
			$in=$conn->exec("INSERT INTO `certion`(`uid`,`name`,`phone`,`idCard`,`qq`) 
				VALUES (".$id.",'".$name."',".$phone.",'".$idcard."',".$qq.")");
			if($in){
				echo "true";
			}
			else{
				echo "error";
			}
		}
		else{
			echo "cardfalse";
		}
	}
	else{
		echo "false";
	}
	
	
	
	
	
				
	}
	
	
?>