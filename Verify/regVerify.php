<?php
//引入数据库连接文件
require("../Include/connect.php");
require("../Include/ini.php");
if(isset($_POST['reusername']) && isset($_POST['reuserpswd']) && isset($_POST['reuseremail'])){
	//接收POST数据并存为变量
	ini_set('date.timezone', 'Asia/Shanghai');
	$name=trim($_POST['reusername']);
	$pswd=trim($_POST['reuserpswd']);
	$email=trim($_POST['reuseremail']);
	foreach($conn->query("SELECT `userName` FROM `user` WHERE `userName`='".$name."'") as $rowname){}
	foreach($conn->query("SELECT `userEmail` FROM `user` WHERE `userEmail`='".$email."'") as $rowemail){}
	if(@$rowname['0'] == $name){
		echo "namefalse";
	}
	elseif(@$rowemail['0'] == $email){
		echo "emailfalse";
	}
	else{
		$tokenStr=$name.$pswd.$email;
		$token=md5($tokenStr);
		$tokenPeriod=time()+(60*60*24);
		$insert=$conn->exec("INSERT INTO `user`(`userName`,`userEmail`,`userPswd`,`regDate`,`token`,`tokenPeriod`) 
							VALUES ('".$name."','".$email."','".$pswd."',".time().",'".$token."','".$tokenPeriod."')");
		if($insert){
			include("../Include/Smtp.php");
			include("smtp.class.php");
				$smtpemailto = $email;//发送给谁 
			    $mailtype = "HTML"; //信件类型，文本:text；网页：HTML 
			    $smtpemailto = $email; //接收邮件方，本例为注册用户的Email 
			    $smtpemailfrom = $smtpusermail; //发送邮件方，如xxx@163.com 
			    $mailsubject = "用户账户激活验证 - ".SITENAME;//邮件标题 
			    //邮件主体内容 
			    $mailbody = "尊敬的".$name."：<br/>感谢您在".SITENAME."注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
			    <a href='http://".SITEDOMAIN."/Active.php?Verify=".$token."' target=
				'_blank'>http://".SITEDOMAIN."/Active.php?Verify=".$token."</a><br/> 
			        如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。
			    <br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/>
			    <p style='text-align:right'>-------- From ".SITENAME."</p>";
				$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
				$smtptoken=$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
				if($smtptoken){
					echo "true";
				}
				else{
					echo "emailsendfalse";
				}
		}
		else{
			echo "false";
		}
	}
	
}
	
	
	
?>