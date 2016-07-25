<?php
session_start();
require("../../Include/connect.php");
	if(isset($_POST['upusername']) && isset($_POST['upquota']) && isset($_POST['upzq'])
		&& isset($_POST['upmo']) && isset($_POST['upstart']) && isset($_POST['upactive']) && isset($_POST['oldname'])){
			if(isset($_SESSION['lineselect'])){
				$upname=$_POST['upusername'];
				$upzq=$_POST['upzq'];
				$upquota=$_POST['upquota'];
				$upline=$_SESSION['lineselect'];
				$old=$_POST['oldname'];
				switch($_POST['upmo']){
					case "天数":$upmo=0;break;
					case "流量":$upmo=1;break;
					case "混合":$upmo=2;break;
				}
				switch($_POST['upstart']){
					case "激活":$upstart=1;break;
					case "未激活":$upstart=0;break;
				}
				switch($_POST['upactive']){
					case "正常":$upac=1;break;
					case "锁定":$upac=0;break;
				}
				foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$upline."'") as $upvsele){}
				@$connup = new PDO('mysql:host='.$upvsele['sqlhost'].';port='.$upvsele['sqlport'].';dbname='.$upvsele['sqldata'].';charset=utf8', ''.$upvsele['sqlname'].'', ''.$upvsele['sqlpswd'].'');
				foreach($connup->query("SELECT `username` FROM `test` WHERE `username`='".$old."'") as $upse){}
				if(@$upse){
					
					$addquery = "UPDATE `test` SET `username`='".$upname."',`mo`=".$upmo.",`zq`=".$upzq.",
							`quota`=".$upquota.",`start`=".$upstart.",`active`=".$upac." WHERE `username`='".$old."'";
					$upup=$connup->exec($addquery);
					if(@$upup){
						echo "true";
					}
					else{
						echo "false";
					}
				}
				else{
					echo "isfalse";
				}
			}
			else{
				echo "linefalse";
			}
			//销毁变量
			$connup=NULL;
			unset($upname,$upzq,$upquota,$upline,$upmo,$upstart,$upac,$upup,$upse,$old);
		}
	
	
	
	
?>