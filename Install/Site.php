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
  <title>安装 - 站点信息 - 第二步</title>
</head>

<body>

<div class="admin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="icon-lock"></i> 安装 - 站点信息 - 第二步
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form class="form-horizontal">
                    <!-- Registration form starts -->
                                      <!-- 站点名称 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="name">站点名称</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sitename" placeholder="请输入站点名称" class="form-control" id="name">
                                            </div>
                                          </div>   
                                          <!-- 站点域名 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">站点域名</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sitedomain" placeholder="请输入站点域名" class="form-control" id="email">
                                            </div>
                                          </div>
                                          <!-- 站点关键字 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="username">站点关键字</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sitekey" placeholder="SEO站点关键字" class="form-control" id="username">
                                            </div>
                                          </div>
                                          <!-- 站点描述 -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-3" for="email">站点描述</label>
                                            <div class="col-lg-9">
                                              <input type="text" name="sitedesc" placeholder="SEO站点描述" class="form-control" id="password">
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
					var name=$("input[name=sitename]").attr("value");
					var domain=$("input[name=sitedomain]").attr("value");
					var keywr=$("input[name=sitekey]").attr("value");
					var desc=$("input[name=sitedesc]").attr("value");
					name=encodeURIComponent(name);
					domain=encodeURIComponent(domain);
					keywr=encodeURIComponent(keywr);
					desc=encodeURIComponent(desc);
					if(name==""){
						Confirm.show('提示', '站点名称不能为空！');
						return false;
					}
					else if(domain==""){
						Confirm.show('提示', '站点域名不能为空！');
						return false;
					}
					else if(keywr==""){
						Confirm.show('提示', 'SEO关键字不能为空！');
						return false;
					}
					else if(desc==""){
						Confirm.show('提示', 'SEO描述不能为空！');
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
										Confirm.show('提示', '站点信息配置成功，3秒后进入下一步！');
										setTimeout('location="IndexIng.php?Install=Auser"',3000);
									}
									else if(xhr.responseText=="savefalse"){
										Confirm.show('提示', '写入错误！');
										return false;
									}
							}
						}
						xhr.open("POST","Verify/inWebSiteVerify.php");
						xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "sitename="+name+"&sitedomain="+domain+"&sitekey="+keywr+"&sitedesc="+desc;
						xhr.send(info);
					}
				})
				
			})
</script>
</body>
</html>