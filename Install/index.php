<?php
	if(phpversion()<5.3){
		echo "你的PHP版本为".phpversion()."不适合安装此程序，请升级到PHP5.3以上版本！";
	}
	else{
		include_once("installSql.php");
	}
		
?>