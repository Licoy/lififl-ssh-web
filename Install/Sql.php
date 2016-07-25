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
  <title>安装 - 数据库 - 第一步</title>
</head>

<body>

<div class="admin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="icon-lock"></i> 安装 - 数据库 - 第一步
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form class="form-horizontal">
                    <!-- Registration form starts -->
                                      <!-- 数据库地址 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="name">数据库地址</label>
                                            <div class="col-lg-9">
                                              <input type="text" value="localhost" name="sqlhost" class="form-control" id="name">
                                            </div>
                                          </div>   
                                          <!-- 数据库用户 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">数据库用户</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sqlusername" placeholder="数据库用户名" class="form-control" id="email">
                                            </div>
                                          </div>
                                          <!-- 数据库密码 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="username">数据库密码</label>
                                            <div class="col-lg-9">
                                              <input type="password" name="sqluserpswd" placeholder="数据库密码" class="form-control" id="username">
                                            </div>
                                          </div>
                                          <!-- 数据库实例 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">数据库实例</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sqldatabase" placeholder="数据库名" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- 端口 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">端口</label>
                                            <div class="col-lg-9">
                                              <input type="text" value="3306" name="sqlport" class="form-control" id="password">
                                            </div>
                                          </div>
                                          <!-- 提交 -->
                                          <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                              <button type="button" class="btn btn-danger">下一步</button>
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
					var name=$("input[name=sqlusername]").attr("value");
					var pswd=$("input[name=sqluserpswd]").attr("value");
					var host=$("input[name=sqlhost]").attr("value");
					var base=$("input[name=sqldatabase]").attr("value");
					var port=$("input[name=sqlport]").attr("value");
					if(host==""){
						Confirm.show('提示', '数据库地址不能为空！');
						return false;
					}
					else if(name==""){
						Confirm.show('提示', '数据库用户名不能为空！');
						return false;
					}
					else if(pswd==""){
						Confirm.show('提示', '数据库密码不能为空！');
						return false;
					}
					else if(base==""){
						Confirm.show('提示', '数据库名(实例)不能为空！');
						return false;
					}
					else if(port==""){
						Confirm.show('提示', '数据库端口不能为空！');
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
										Confirm.show('提示', '数据库连接成功，3秒后进入下一步！');
										setTimeout('location="IndexIng.php?Install=Site"',3000);
										
									}
									else if(xhr.responseText=="sqlfalse"){
										Confirm.show('提示', '数据库无法连接！请查看是否输入正确！');
										return false;
									}
							}
						}
						xhr.open("POST","Verify/inSqlVerify.php");
						xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "sqlhost="+host+"&sqlusername="+name+"&sqluserpswd="+pswd+"&sqldatabase="+base+"&sqlport="+port;
						xhr.send(info);
					}
				})
				
			})
</script>
</body>
</html>