<?php
require("../Include/connect.php");
if(isset($_POST['oldpswd']) && isset($_POST['newpswd']) && isset($_POST['id'])){
	$oldpswd=$_POST['oldpswd'];
	$newpswd=$_POST['newpswd'];
	$id=$_POST['id'];
	foreach($conn->query("SELECT `userPswd` FROM `user` WHERE `id`=".$id."") as $row){}
	if($row['0']==$oldpswd){
		$up=$conn->exec("UPDATE `user` SET `userPswd`='".$newpswd."' WHERE `id`=".$id."");
		if($up){
			echo "true";
		}
		else{
			echo "false";
		}
		
	}
	else{
		echo "oldfalse";
	}



	
}

?>