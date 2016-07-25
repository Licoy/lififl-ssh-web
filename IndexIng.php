<?php
session_start();
require("Include/Islogout.php");
require("Include/Isstart.php");
require("Include/function.php");
//继续实例
if(isset($_GET['Install'])){
	$c_str=$_GET['Install'];
	//获取要运行的controller
	$c_name=$c_str;
	//按照约定url中获取的controller名字不包含Controller，此处补齐。
	$c_path='Install/'.$c_name.'.php';
	//按照约定controller文件要建立在controller文件夹下，类名要与文件名相同，且文件名要全部小写。
	require($c_path);
	//加载controller文件
	@$controller = new $c_name;
	//实例化文件
}
elseif(isset($_GET['Start'])){
	$c_str=$_GET['Start'];
	$c_name=$c_str;
	$c_path='Start/'.$c_name.'.php';
	require($c_path);
	@$controller = new $c_name;
}
elseif(isset($_GET['User'])){
	$c_str=$_GET['User'];
	$c_name=$c_str;
	$c_path='User/'.$c_name.'.php';
	require($c_path);
	@$controller = new $c_name;
}

