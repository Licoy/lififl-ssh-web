<?php
require("../Include/connect.php");
if(isset($_POST['sqlhost']) && isset($_POST['sqlname'])  && isset($_POST['sqlpswd']) && isset($_POST['sqlport'])
	 && isset($_POST['sqldata']) && isset($_POST['sqlcat'])){
	 	foreach($conn->query("SELECT COUNT(*) FROM `line`") as $scount){}
		if($scount['0']<6){
				//检测数据库是否可以连接
		 	@$testconn=mysqli_connect($_POST['sqlhost'], $_POST['sqlname'], $_POST['sqlpswd'], $_POST['sqldata'], $_POST['sqlport']);
			if($testconn){
				//检测数据库是否已经有该条记录
				foreach($conn->query("SELECT `sqlhost` FROM `line` WHERE `sqlhost`='".$_POST['sqlhost']."'") as $shost){}
					if(@!$shost){
						$in=$conn->exec("INSERT INTO `line`(`sqlhost`,`sqlname`,`sqlpswd`,`sqlport`,`sqldata`,`sqlcat`) VALUES('".$_POST['sqlhost']."',
						'".$_POST['sqlname']."','".$_POST['sqlpswd']."',".$_POST['sqlport'].",'".$_POST['sqldata']."','".$_POST['sqlcat']."')");
						if($in){
							echo "true";
						}
						else{
							echo "false";
						}
					
					
					}
					else{
						echo "sqlfalse";
					}
			}
			else{
				echo "sqlerror";
			}
		}
		else{
			echo "sumfalse";
		}
		
	 	
		
		
	 	
		
		
		
		
	 }
	
	
	
	
?>