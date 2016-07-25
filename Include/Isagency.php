<?php
	require("Include/Isstart.php");
	//判断是否是代理
	if($_SESSION['userlevel']!="1" && $_SESSION['userlevel']!="2" && $_SESSION['userlevel']!="3"){
		echo '<script type="text/javascript">alert("你没有权限进入进入此页面！");location="IndexIng.php?User=Index";</script>';
	}
?>