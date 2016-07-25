<?php
require("../Include/connect.php");
if(isset($_POST['singin']) && isset($_POST['id'])){
	$id=$_POST['id'];
	foreach($conn->query("SELECT * FROM `user` WHERE `id`=".$id."") as $s){}
	ini_set('date.timezone', 'Asia/Shanghai');
	$nowtime=time();
	$ltime=$s['singinDate']+(60*60*24);
	if($nowtime<$ltime){
		echo "oldsing";
	}
	else{
		$rand=rand(10,30);
		$rs=$conn->exec("UPDATE `user` SET `singinDate`=".time()." WHERE `id`=".$id."");
		$up=$conn->exec("UPDATE `user` SET `userGold`=".($s['userGold']+$rand)." WHERE `id`=".$id."");
		if($rs && $up){
			echo $rand;
		}
		else{
			echo "error";
		}
	}
	
	
}
?>