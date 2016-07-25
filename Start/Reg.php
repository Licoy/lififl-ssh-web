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
  <title>注册 - <?php echo SITENAME ?></title> 
</head>

<body>
<div id="loading" style="color:#ffffff; display:none; position:absolute; top:80px; left:3em;"></div> 
<div class="admin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="icon-lock"></i> 注册 - <?php echo SITENAME ?>
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form class="form-horizontal">
                    <!-- Registration form starts -->
                                      <!-- Name -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="name">用户名</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="reusername" class="form-control" id="name">
                                            </div>
                                          </div>   
                                          <!-- Email -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">邮箱</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="reuseremail" class="form-control" id="email">
                                            </div>
                                          </div>
                                          <!-- 密码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">密码</label>
                                            <div class="col-lg-9">
                                              <input type="password" name="reuserpswd" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- 确认密码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">确认密码</label>
                                            <div class="col-lg-9">
                                              <input type="password" name="vreuserpswd" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- 验证码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">验证码</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="vsum" class="form-control" id="password" placeholder="<?php
                                              $vsum=vsum();
                                              echo  $vsum['0'];
                                              ?>">
                                            </div>
                                          </div>
                                          <!-- Accept box and button s-->
                                          <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                              <button type="button" class="btn btn-danger">立即注册</button>
                                            </div>
                                          </div>
										  <br />
                  </form>

                </div>
              </div>
                <div class="widget-foot">
                 <center><a href="IndexIng.php?Start=Login">已有账号?返回登录</a></center>
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
					var name=$("input[name=reusername]").attr("value");
					var pswd=$("input[name=reuserpswd]").attr("value");
					var email=$("input[name=reuseremail]").attr("value");
					var vpswd=$("input[name=vreuserpswd]").attr("value");
					var vsum=$("input[name=vsum]").attr("value");
					name=encodeURIComponent(name);
					pswd=encodeURIComponent(pswd);
					email=encodeURIComponent(email);
					vpswd=encodeURIComponent(vpswd);
					vsum=vsum.trim(vsum);
					if(name==""){
						Confirm.show('提示', '用户名不能为空！');
						return false;
					}
					else if(email==""){
						Confirm.show('提示', '邮箱不能为空！');
						return false;
					}
					else if(pswd==""){
						Confirm.show('提示', '密码不能为空！');
						return false;
					}
					else if(vpswd==""){
						Confirm.show('提示', '重复密码不能为空！');
						return false;
					}
					else if(pswd != vpswd){
						Confirm.show('提示', '两次输入的密码不一致！');
						return false;
					}
					else if(vsum == ""){
						Confirm.show('提示', '验证码不能为空！');
						return false;
					}
					else if(vsum != <?php echo $vsum['1'] ?>){
						Confirm.show('提示', '验证码计算错误！');
						return false;
					}
					else{
						var xhr = new XMLHttpRequest();
						xhr.onreadystatechange = function(){
							<?php echo loading("xhr") ?>
							if(xhr.readyState == 4){
									$("#ui-mask").remove();
									$("#change_loading").remove();
									var str=xhr.responseText;
									str=str.trim(str);
									if(str=="true"){
										Confirm.show('提示', '注册成功，3秒之后将自动返回登录页面！');
										setTimeout('location="IndexIng.php?Start=Login"',3000);
									}
									else if(str=="namefalse"){
										Confirm.show('提示', '用户名已经被注册！');
										return false;
									}
									else if(str=="emailfalse"){
										Confirm.show('提示', '邮箱已经被注册！');
										return false;
									}
									else if(str=="emailsendfalse"){
										Confirm.show('提示', '验证邮件发送失败！');
										return false;
									}
									else{
										Confirm.show('提示', '注册失败！');
										return false;
									}
							}
						}
						xhr.open("POST","Verify/regVerify.php");
						xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "reusername="+name+"&reuserpswd="+pswd+"&reuseremail="+email;
						xhr.send(info);
					}
				})
				
			})
</script>
</body>
</html>