<?php
if(file_exists("Install/install.lock")){
	echo '<script type="text/javascript" charset="UTF-8">location="Install/installLock.html"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
	<?php require("Include/header.php") ?>
  <title>安装 - 管理员信息 - 第三步</title> 
</head>

<body>

<div class="admin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="icon-lock"></i> 安装 - 管理员信息 - 第三步
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form class="form-horizontal">
                    <!-- Registration form starts -->
                                      <!-- Name -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="name">用户名</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="reusername" placeholder="管理员用户名" class="form-control" id="name">
                                            </div>
                                          </div>   
                                          <!-- Email -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">邮箱</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="reuseremail" placeholder="管理员邮箱" class="form-control" id="email">
                                            </div>
                                          </div>
                                          <!-- 密码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">密码</label>
                                            <div class="col-lg-9">
                                              <input type="password" name="reuserpswd" placeholder="管理员密码" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- 确认密码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">确认密码</label>
                                            <div class="col-lg-9">
                                              <input type="password" name="vreuserpswd" placeholder="确认密码" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- Accept box and button s-->
                                          <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                              <button type="button" class="btn btn-danger">完成安装</button>
                                            </div>
                                          </div>
										  <br />
                  </form>

                </div>
              </div>
                <div class="widget-foot">
                 <center>©2016 LiFiFl控流系统</center>
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
					name=encodeURIComponent(name);
					pswd=encodeURIComponent(pswd);
					email=encodeURIComponent(email);
					vpswd=encodeURIComponent(vpswd);
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
					else{
						var xhr = new XMLHttpRequest();
						xhr.onreadystatechange = function(){
							<?php echo loading("xhr") ?>
							if(xhr.readyState == 4){
									$("#ui-mask").remove();
									$("#change_loading").remove();
									if(xhr.responseText=="true"){
										Confirm.show('提示', '安装成功！3秒后返回首页登录！');
										setTimeout('location="IndexIng.php?Start=Login"',3000);
									}
									else if(xhr.responseText=="false"){
										Confirm.show('提示', '管理员信息写入数据库出错！');
									}
							}
						}
						xhr.open("POST","Verify/inAdminUser.php");
						xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "reusername="+name+"&reuserpswd="+pswd+"&reuseremail="+email;
						xhr.send(info);
					}
				})
				
			})
</script>
</body>
</html>