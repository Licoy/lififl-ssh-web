<?php
//引入数据库连接文件
require("../Include/connect.php");
//引入函数文件
require("../Include/function.php");
if(isset($_POST['sitename']) && isset($_POST['sitedomain']) 
		&& isset($_POST['sitekey']) && isset($_POST['sitedesc'])){
	//接收POST数据并存为变量
	$name=$_POST['sitename'];
	$domain=$_POST['sitedomain'];
	$key=$_POST['sitekey'];
	$desc=$_POST['sitedesc'];
		$siteStr='<?php
		define("SITENAME", "'.$name.'");
		define("SITEDOMAIN", "'.$domain.'");
		define("SITEKEY", "'.$key.'");
		define("SITEDESC", "'.$desc.'");
		?>';
		$save=saveFile("../Include/ini.php",$siteStr);
		if($save){
			echo "true";
		}
		else{
			echo "savefalse";
		}
		
	
}
	
	
	
?>