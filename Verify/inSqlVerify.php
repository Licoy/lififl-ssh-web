<?php
//引入函数文件
require("../Include/function.php");
if(isset($_POST['sqlusername']) && isset($_POST['sqluserpswd']) 
		&& isset($_POST['sqldatabase']) && isset($_POST['sqlhost']) && isset($_POST['sqlport'])){
	//接收POST数据并存为变量
	$name=$_POST['sqlusername'];
	$pswd=$_POST['sqluserpswd'];
	$base=$_POST['sqldatabase'];
	$host=$_POST['sqlhost'];
	$port=$_POST['sqlport'];
	@$testconn=mysqli_connect($host, $name, $pswd, $base, $port);
	if($testconn){
		mysqli_close($testconn);
		$sqlStr='<?php
		define("SQLHOST", "'.$host.'");
		define("SQLUSER", "'.$name.'");
		define("SQLPSWD", "'.$pswd.'");
		define("SQLBASE", "'.$base.'");
		define("SQLPORT", "'.$port.'");
		?>';
		saveFile("../Include/config.php",$sqlStr);
		require("../Include/config.php");
		require("../Include/connect.php");
		$sqlStr="SET FOREIGN_KEY_CHECKS=0;
			DROP TABLE IF EXISTS `user`;
			CREATE TABLE `user` (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `userName` varchar(20) NOT NULL, 
			  `userPswd` varchar(18) NOT NULL,
			  `userEmail` varchar(20) NOT NULL,
			  `token` varchar(100) NOT NULL,
			  `tokenPeriod` int(50) NOT NULL,
			  `status` int(1) NOT NULL DEFAULT '0',
			  `regDate` int(50) NOT NULL,
			  `userLevel` int(1) NOT NULL DEFAULT '0',
			  `singinDate` int(20) NOT NULL DEFAULT '0',
			  `userGold` int(50) NOT NULL DEFAULT '0',
			  `isCertion` int(1) NOT NULL DEFAULT '0',
			  `isLine` varchar(30) NOT NULL DEFAULT '0',
			  `lineName` varchar(30) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
			DROP TABLE IF EXISTS `notice`;
			CREATE TABLE `notice` (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `content` varchar(300) NOT NULL,
			  `notdate` int(20) NOT NULL,
			  `notuid` int(5) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
			DROP TABLE IF EXISTS `certion`;
			CREATE TABLE `certion` (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `uid` int(5) NOT NULL,
			  `name` varchar(20) NOT NULL,
			  `phone` int(11) NOT NULL,
			  `idCard` varchar(18) NOT NULL,
			  `qq` int(13) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
			DROP TABLE IF EXISTS `line`;
			CREATE TABLE `line` (
			  `id` int(5) NOT NULL AUTO_INCREMENT,
			  `sqlhost` varchar(30) NOT NULL,
			  `sqlname` varchar(30) NOT NULL,
			  `sqlpswd` varchar(30) NOT NULL,
			  `sqldata` varchar(30) NOT NULL,
			  `sqlport` int(10) NOT NULL,
			  `sqlcat` varchar(20) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			";
		$conn->exec($sqlStr);
		echo "true";
	}
	else{
		echo "sqlfalse";
	}
}
	
	
	
?>