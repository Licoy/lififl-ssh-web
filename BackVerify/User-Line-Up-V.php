<?php
require("../Include/connect.php");
if(isset($_POST['uphost']) && isset($_POST['upname'])  && isset($_POST['uppswd']) && isset($_POST['upport'])
	 && isset($_POST['updata']) && isset($_POST['upcat']) && isset($_POST['id'])){
				//检测数据库是否可以连接
		 	@$testconn=mysqli_connect($_POST['uphost'], $_POST['upname'], $_POST['uppswd'], $_POST['updata'], $_POST['upport']);
			if($testconn){
						$up=$conn->exec("UPDATE `line` SET `sqlhost`='".$_POST['uphost']."',`sqlname`='".$_POST['upname']."',`sqlpswd`='".$_POST['uppswd']."',`sqlport`=".$_POST['upport'].",
							`sqldata`='".$_POST['updata']."',`sqlcat`='".$_POST['upcat']."' WHERE `id`=".$_POST['id']."");
						if(@$up){
							echo "true";
						}
						else{
							echo "false";
						}
					
			}
			else{
				echo "uperror";
			}
		
	 	
		
		
	 	
		
		
		
		
	 }
	
	
	
	
?>