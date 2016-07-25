<?php
session_start();
require("../../Include/connect.php");
	if(isset($_POST['bdidname']) && isset($_POST['bdidline']) && isset($_POST['bduserid'])){
			$bdname=$_POST['bdidname'];
			$bdline=$_POST['bdidline'];
			$bdid=$_POST['bduserid'];
			foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$bdline."'") as $bdvseleline){}
			@$connbdv = new PDO('mysql:host='.$bdvseleline['sqlhost'].';port='.$bdvseleline['sqlport'].';dbname='.$bdvseleline['sqldata'].';
				charset=utf8', ''.$bdvseleline['sqlname'].'', ''.$bdvseleline['sqlpswd'].'');
			foreach(@$connbdv->query("SELECT `username` FROM `test` WHERE `username`='".$bdname."'") as $bdvselename){}
			if(@$bdvselename){
					@$bdup=$conn->exec("UPDATE `user` SET `isLine`='".$bdline."',`lineName`='".$bdname."' WHERE `id`=".$bdid."");
					if(@$bdup){
						echo "true";
					}
					else{
						echo "false";
					}
			}
			else{
				echo "nameerror";
			}
		
		
		
		}
	
	
	
	
	
?>