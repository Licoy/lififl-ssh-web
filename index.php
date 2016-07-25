<?php
session_start();
@include("Include/ini.php");
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>'.SITENAME.'</title>
</head>';
//判断是否安装
if(file_exists("Install/install.lock")){}
else{ 
  echo '<script type="text/javascript">location="IndexIng.php?Install=Sql"</script>';
}
//判断是否已经登录
if(isset($_SESSION['username']) && isset($_SESSION['userpswd'])){
	echo '<script type="text/javascript">location="IndexIng.php?User=Index"</script>';
}
?>
<script type="text/javascript">location='IndexIng.php?Start=Login'</script>