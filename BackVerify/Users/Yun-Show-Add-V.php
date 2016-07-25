<?php
session_start();
require("../../Include/connect.php");
	if(isset($_POST['addusername']) && isset($_POST['addpassword']) && isset($_POST['addquota'])
		&& isset($_POST['addqz']) && isset($_POST['addstart']) && isset($_POST['addmo'])){
			if(isset($_SESSION['lineselect'])){
				$name=$_POST['addusername'];
				$pswd=$_POST['addpassword'];
				$quota=$_POST['addquota'];
				$qz=$_POST['addqz'];
				$line=$_SESSION['lineselect'];
				switch($_POST['addmo']){
					case "天数":$mo=0;break;
					case "流量":$mo=1;break;
					case "混合":$mo=2;break;
				}
				switch($_POST['addstart']){
					case "激活":$start=1;break;
					case "未激活":$start=0;break;
				}
				foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$line."'") as $addvsele){}
				@$connadd = new PDO('mysql:host='.$addvsele['sqlhost'].';port='.$addvsele['sqlport'].';dbname='.$addvsele['sqldata'].';charset=utf8', ''.$addvsele['sqlname'].'', ''.$addvsele['sqlpswd'].'');
				foreach($connadd->query("SELECT `username` FROM `test` WHERE `username`='".$name."'") as $se){}
				if(@$se){
					echo "isfalse";
				}
				else{
				$addquery = "INSERT INTO `test`(`username`,`password`,`name`,`note`,`mo`,`quota`,`now`,
						`zq`,`zxzt`,`start`,`active`,`updata`,`downdata`) VALUES('".$name."',
						ENCRYPT('".$pswd."','".$name."'),'".$name."','null',".$mo.",".$quota.",0,".$qz.",0,".$start.",1,0,0);";
				$in=$connadd->exec($addquery);
				if(@$in){
					echo "true";
				}
				else{
					echo "false";
				}
				}
			}
			else{
				echo "linefalse";
			}
			//销毁变量
			$connadd=NULL;
			unset($name,$pswd,$quota,$qz,$active,$mo,$line,$in,$se);
		}
	
	
	
	
?>