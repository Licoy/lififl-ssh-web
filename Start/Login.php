<?php
require("Include/Isstart.php");
require("Include/ini.php");
if(isset($_SESSION['username']) && isset($_SESSION['userpswd'])){
	echo '<script type="text/javascript">location="IndexIng.php?User=Index"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php include("Include/header.php") ?>
  <title>登录 - <?php echo SITENAME ?></title>
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> 登录 - <?php echo SITENAME ?>
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" action="" method="post">
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">邮箱</label>
                      <div class="col-lg-9">
                        <input type="text" name="loguseremail" class="form-control" id="inputEmail" placeholder="请输入您的邮箱">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">密码</label>
                      <div class="col-lg-9">
                        <input type="password" name="loguserpswd" class="form-control" id="inputPassword" placeholder="请输入您的密码">
                      </div>
                    </div>
                    <center>
                        <div class="col-lg-9 col-lg-offset-2">
							<button type="button" class="btn btn-danger">登录</button>
						</div></center>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  <center><a href="IndexIng.php?Start=Reg">立即注册</a> | <a href="IndexIng.php?Start=Rekey">忘记密码</a></center>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<?php include("Include/script.php") ?>
<script type="text/javascript">
			$(function(){
				$(".btn").click(function(){
					var name=$("input[name=loguseremail]").attr("value");
					var pswd=$("input[name=loguserpswd]").attr("value");
					name=encodeURIComponent(name);
					pswd=encodeURIComponent(pswd);
					if(name==""){
						Confirm.show('提示', '邮箱不能为空！');
						return false;
					}
					else if(pswd==""){
						Confirm.show('提示', '密码不能为空！');
						return false;
					}
					else{
					var loginxhr = new XMLHttpRequest();
					loginxhr.onreadystatechange = function(){
						<?php echo loading("loginxhr") ?>
							else if(loginxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(loginxhr.responseText=="true"){
									Confirm.show('提示', '登录成功，2秒之后进入用户中心！');
									setTimeout('location="IndexIng.php?User=Index"',2000);
								}
								else if(loginxhr.responseText=="emailfalse"){
									Confirm.show('提示', '该邮箱账户不存在！');
									return false;
								}
								else if(loginxhr.responseText=="pswdfalse"){
									Confirm.show('提示', '密码错误！');
									return false;
								}
								else if(loginxhr.responseText=="statfalse"){
									Confirm.show('提示', '您的账户尚未激活，请查看邮箱进行激活！');
									return false;
								}
							}
						}
						loginxhr.open("POST","Verify/loginVerify.php");
						loginxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "loguseremail="+name+"&loguserpswd="+pswd;
						loginxhr.send(info);
					}
				})
				
			})
	</script>
</body>
</html>