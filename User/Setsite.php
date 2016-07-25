<?php
//站点设置
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/IsAdmin.php");
require("Include/ini.php");
require("Include/connect.php");
$title="站点设置";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("User/header.php"); ?>
   <title><?php echo $title." - ".SITENAME;?></title>
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>菜单</span>
		  </button>
		  <!-- Site name for smallar screens -->
		  <a href="?User=Index" class="navbar-brand hidden-lg"><?php echo SITENAME ?></a>
		</div>
      
      

      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav">  
			<?php require("Include/nav.php") ?>
        </ul>

        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-user"></i> <?php echo $_SESSION['username'] ?><b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="?User=Updata"><i class="icon-user"></i> 个人设置</a></li>
              <li><a href="?User=Uppswd"><i class="icon-cogs"></i> 密码修改</a></li>
              <li><a href="?User=Logout"><i class="icon-off"></i> 退出</a></li>
            </ul>
          </li>
          
        </ul>
      </nav>

    </div>
</div>

<div class="content">

  	

  	  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
	      <h6 class="pull-left"><i class="icon-home"></i> <?php echo $title ?></h6>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="?User=Index"><i class="icon-home"></i> 首页</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a class="bread-current"> <?php echo $title ?></a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



 <!-- Matter -->
	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            	<!--
                	表单
                -->
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">公告发布</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form">
                               <div class="alert alert-success">
                               	提示：公告可以使用HTML标签，但是请勿滥用JS脚本！
                    </div>
                    			 <div class="form-group">
                                  <label class="col-lg-4 control-label">公告内容</label>
                                  <div class="col-lg-8">
                                    <textarea name="notice" class="form-control" rows="3"></textarea>
                                  </div>
                                </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="notice" class="btn btn-success">发布公告</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div>  

            </div>

          </div>

		<!-- Matter ends -->
            	<!--
                	表单
                -->
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left"><?php echo $title ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form">
                               <div class="alert alert-success">
                      修改前请确认Include目录有写入权限
                    </div>
                    			 <div class="form-group">
                                  <label class="col-lg-4 control-label">站点名称</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sitename" value="<?php echo SITENAME?>" class="form-control" >
                                  </div>
                                </div>
                    			
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">站点域名</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sitedomain" value="<?php echo SITEDOMAIN?>" name="username" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">站点关键字</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sitekey" value="<?php echo SITEKEY ?>" name="oldpswd" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">站点描述</label>
                                  <div class="col-lg-8">
                                    <input type="email" name="sitedesc" value="<?php echo SITEDESC ?>" name="useremail" class="form-control" >
                                  </div>
                                </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="setsite" class="btn btn-success">更新资料</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div>  

            </div>

          </div>

        </div>
		  </div>

		<!-- Matter ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy"><center>Copyright 2016 | <a href="<?php echo "http://".SITEDOMAIN;?>"><?php echo SITENAME;?></a> </center></p>
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<?php require("User/script.php");?>
<script type="text/javascript">
			$(function(){
				$("button[name=notice]").click(function(){
					var notice=$("textarea[name=notice]").attr("value");
					notice=notice.trim(notice);
					notice=encodeURIComponent(notice);
					if(notice==""){
						myTips("公告不能为空！","error");
						return false;
					}
					else{
					var noticexhr = new XMLHttpRequest();
					noticexhr.onreadystatechange = function(){
						<?php echo loading("noticexhr") ?>
						else if(noticexhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(noticexhr.responseText=="true"){
									myTips("恭喜你，公告发布成功！","success");
									setTimeout('location="?User=Setsite"',2000);
								}
								else if(noticexhr.responseText=="false"){
									myTips("很遗憾，公告发布失败！","error");
									return false;
								}
							}
						}
						noticexhr.open("POST","BackVerify/User-Setsite.php");
						noticexhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "notice="+notice+"&id="+<?php echo $_SESSION['id']?>;
						noticexhr.send(info);
					}
				})
				
				$("button[name=setsite]").click(function(){
					var name=$("input[name=sitename]").attr("value");
					var domain=$("input[name=sitedomain]").attr("value");
					var sitekey=$("input[name=sitekey]").attr("value");
					var sitedesc=$("input[name=sitedesc]").attr("value");
					name=encodeURIComponent(name);
					domain=encodeURIComponent(domain);
					sitekey=encodeURIComponent(sitekey);
					sitedesc=encodeURIComponent(sitedesc);
					if(name==""){
						myTips("邮箱不能为空！","error");
						return false;
					}
					else if(domain==""){
						myTips("邮箱不能为空！","error");
						return false;
					}
					else if(sitekey==""){
						myTips("邮箱不能为空！","error");
						return false;
					}
					else if(sitedesc==""){
						myTips("邮箱不能为空！","error");
						return false;
					}
					else{
					var updataxhr = new XMLHttpRequest();
					updataxhr.onreadystatechange = function(){
						<?php echo loading("updataxhr") ?>
						else if(updataxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(updataxhr.responseText=="true"){
									myTips("恭喜你，配置更新成功！","success");
									setTimeout('location="?User=Setsite"',2000);
								}
								else if(updataxhr.responseText=="false"){
									myTips("很遗憾，配置更新失败！","error");
									return false;
								}
							}
						}
						updataxhr.open("POST","BackVerify/User-Setsite.php");
						updataxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "sitename="+name+"&sitedomain="+domain+"&sitekey="+sitekey+"&sitedesc="+sitedesc;
						updataxhr.send(info);
					}
				})
				
				
			})
	</script>
</body>
</html>