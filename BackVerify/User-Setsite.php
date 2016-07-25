<?php
require("../Include/function.php");
require("../Include/connect.php");
if(isset($_POST['sitename']) && isset($_POST['sitedomain']) && isset($_POST['sitekey']) && isset($_POST['sitedesc'])){
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
			echo "false";
		}

}
if(isset($_POST['notice']) && isset($_POST['id'])){
	$notice=$_POST['notice'];
	$id=$_POST['id'];
	$in=$conn->exec("INSERT INTO `notice`(`content`,`notdate`,`notuid`) VALUES ('".$notice."',".time().",".$id.")");
	if($in){
		echo "true";
	}
	else{
		echo "false";
	}
}
?>