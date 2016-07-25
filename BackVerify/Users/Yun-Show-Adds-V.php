<?php
session_start();
require("../../Include/connect.php");
require("../../Include/function.php");
	if(isset($_POST['addsnum']) && isset($_POST['addsmo']) && isset($_POST['addsquota']) 
				&& isset($_POST['addszq']) && isset($_POST['addsstart'])){
			if(isset($_SESSION['lineselect'])){//检测是否选择线路
				$isrid=is_writable("../../Randid");//检测目录是否有写入权限
				if($isrid){
					$adquota=$_POST['addsquota'];
					$adzq=$_POST['addszq'];
					$adline=$_SESSION['lineselect'];
					$adnum=$_POST['addsnum'];
					switch($_POST['addsmo']){
						case "天数":$admo=0;break;
						case "流量":$admo=1;break;
						case "混合":$admo=2;break;
					}
					switch($_POST['addsstart']){
						case "激活":$adstart=1;break;
						case "未激活":$adstart=0;break;
					}
					foreach(@$conn->query("SELECT * FROM `line` WHERE `sqlhost`='".$adline."'") as $advsele){}
					@$connadds = new PDO('mysql:host='.$advsele['sqlhost'].';port='.$advsele['sqlport'].';dbname='.$advsele['sqldata'].';charset=utf8', ''.$advsele['sqlname'].'', ''.$advsele['sqlpswd'].'');
					//生成随机账号密码
					$arrpswd=array();
					$arrname=array();
					$i=0;
					while($i<$adnum){
						$arrn=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
						foreach($connadds->query("SELECT `username` FROM `test` WHERE `username`='".$arrn."'") as $arrnse){}
						if(@!$arrnse){
							$arrname[$i]=$arrn;
							$arrpswd[$i]=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
							$i++;
						}
					}
					//随机账号生成完毕
					$datetxt=date("Y-m-d-H-i-s",time());
					$_SESSION['datetxt']=$datetxt;
					for($d=0;$d<$adnum;$d++){
							$ranstr='账号：'.$arrname[$d].' 密码：'.$arrpswd[$d].'<br/>';
							file_put_contents("../../Randid/".$datetxt.".txt",$ranstr,FILE_APPEND);
					}
					for($a=0;$a<$adnum;$a++){
						$addsquery = "INSERT INTO `test`(`username`,`password`,`name`,`note`,`mo`,`quota`,`now`,
							`zq`,`zxzt`,`start`,`active`,`updata`,`downdata`) VALUES('".$arrname[$a]."',
							ENCRYPT('".$arrpswd[$a]."','".$arrname[$a]."'),'".$arrname[$a]."','null',".$admo.",".$adquota.",0,".$adzq.",0,".$adstart.",1,0,0);";
						$ad=$connadds->exec($addsquery);
					}
					if(@$ad){
						echo "true";
					}
					else{
						echo "false";
					}
				}
				else{
					echo "notisrid";//目录没有写入权限
				}
				
			}
			else{
				echo "linefalse";
			}
			//销毁变量
			$connadds=NULL;
			unset($adquota,$adzq,$adline,$adnum,$admo,$adstart,$arrpswd,$arrname,$arrnse,$addsquery,$ad,$ranstr,$d);
		}
	
	
	
	
?>