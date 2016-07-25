<!DOCTYPE html>
<html lang="en">
<head>
<?php
require("Include/header.php");
require("Include/connect.php");
ini_set('date.timezone', 'Asia/Shanghai');
require("Include/ini.php");	
?>
<meta charset="utf-8">
<title>激活验证 - <?php echo SITENAME ?></title>
</head>
<body>
	<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <center>提示</center>
              </div>
<center>
      <br />        
<?php
if(isset($_GET['Verify'])){
	$verify = stripslashes(trim($_GET['Verify']));
	$nowtime = time();
	foreach($conn->query("SELECT * FROM `user` where `token`='".$verify."'") as $row){};
	if(@$row){
		if($nowtime<$row['tokenPeriod']){
			if($row['status']==1){
				echo "该账户已经激活，无需再次激活！";
			}
			else{
			$update=$conn->exec("UPDATE `user` SET `status`=1 WHERE `token`='".$verify."'");
			if($update){
				echo "激活成功";
			}
			else{
				echo "激活失败";
			}
			}
		}
		elseif($row['status']==1){
			echo "该账户已经激活，无需再次激活！";
		}
		else{
			echo "你的激活链接已经过期，请登录您的账号重新获取激活链接！";
		}
	}
	else{
		echo "没有该激活链接！";
	}	
}	
?>
</center>
<div class="widget-content">
                <div class="padd">
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  <center><a href="IndexIng.php?Start=Login">立即登录</a></center>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>