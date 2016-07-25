<?php
//密码修改页面
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/ini.php");
require("Include/connect.php");
$title="密码修改";
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
                  <div class="pull-left">密码修改</div>
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
                      提示：本密码修改只为本站登录的密码，不为云免服务器账户密码修改！
                    </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">原密码</label>
                                  <div class="col-lg-8">
                                    <input type="password" name="oldpswd" class="form-control" placeholder="请输入原密码">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">新密码</label>
                                  <div class="col-lg-8">
                                    <input type="password" name="newpswd" class="form-control" placeholder="新的密码">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">新密码</label>
                                  <div class="col-lg-8">
                                    <input type="password" name="vnewpswd" class="form-control" placeholder="新的密码">
                                  </div>
                                </div>
                                                                
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="uppswd" class="btn btn-success">更新密码</button>
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
				$("button[name=uppswd]").click(function(){
					var oldpswd=$("input[name=oldpswd]").attr("value");
					var newpswd=$("input[name=newpswd]").attr("value");
					var vnewpswd=$("input[name=vnewpswd]").attr("value");
					oldpswd=encodeURIComponent(oldpswd);
					newpswd=encodeURIComponent(newpswd);
					vnewpswd=encodeURIComponent(vnewpswd);
					if(oldpswd==""){
						myTips("旧密码不能为空！","error");
						return false;
					}
					else if(newpswd==""){
						myTips("新密码不能为空！","error");
						return false;
					}
					else if(vnewpswd==""){
						myTips("重复密码不能为空！","error");
						return false;
					}
					else{
					var uppsxhr = new XMLHttpRequest();
					uppsxhr.onreadystatechange = function(){
						<?php echo loading("uppsxhr") ?>
						else if(uppsxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(uppsxhr.responseText=="true"){
									myTips("恭喜你，密码修改成功！","success");
								}
								else if(uppsxhr.responseText=="oldfalse"){
									myTips("旧密码错误！","error");
									return false;
								}
								else if(uppsxhr.responseText=="false"){
									myTips("修改失败，可能是服务器内部错误！","error");
									return false;
								}
							}
						}
						uppsxhr.open("POST","BackVerify/User-Uppswd.php");
						uppsxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "oldpswd="+oldpswd+"&newpswd="+newpswd+"&id=<?php echo $_SESSION['id']; ?>";
						uppsxhr.send(info);
					}
				})
				
			})
	</script>
</body>
</html>