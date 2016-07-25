<?php
//个人设置
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/ini.php");
require("Include/connect.php");
$title="个人设置";
foreach($conn->query("SELECT * FROM `user` WHERE `id`=".$_SESSION['id']."") as $userData){}
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
                             
                    			 <div class="form-group">
                                  <label class="col-lg-4 control-label">ID</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php echo $userData['id']?>" class="form-control" >
                                  </div>
                                </div>
                    			
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">用户名</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php echo $userData['userName']?>" name="username" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">激活状态</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php if($userData['status']==1){echo "已激活";}else{echo "未激活";} ?>" name="oldpswd" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">邮箱</label>
                                  <div class="col-lg-8">
                                    <input type="email" value="<?php echo $userData['userEmail']?>" name="useremail" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">身份号</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php echo @$userData['userCard']?>" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">权限级别</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php
                                    if(@$userData['userLevel']==1){
                                     	echo "管理员";
                                     }
										elseif(@$userData['userLevel']==2){
											echo "副站长";
										}
										elseif(@$userData['userLevel']==3){
											echo "代理";
										}
										else{
											echo "普通用户";
										}
                                     ?>" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">注册时间</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="<?php echo date("Y-m-d H:i:s",$userData['regDate'])?>" class="form-control" >
                                  </div>
                                </div>
                                
                                                                
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="updata" class="btn btn-success">更新资料</button>
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
				$("button[name=updata]").click(function(){
					var email=$("input[name=useremail]").attr("value");
					var oldemail="<?php echo $userData['userEmail']?>";
					email=encodeURIComponent(email);
					oldemail=encodeURIComponent(oldemail);
					if(email==""){
						myTips("邮箱不能为空！","error");
						return false;
					}
					else if(email == oldemail){
						myTips("新旧邮箱不能相同！","error");
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
									myTips("恭喜你，邮箱修改成功！","success");
									setTimeout('location="?User=Updata"',2000);
								}
								else if(updataxhr.responseText=="emailfalse"){
									myTips("邮箱已经有人使用了！","error");
									return false;
								}
								else if(updataxhr.responseText=="false"){
									myTips("修改失败！","error");
									return false;
								}
							}
						}
						updataxhr.open("POST","BackVerify/User-Updata.php");
						updataxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "useremail="+email+"&id=<?php echo $_SESSION['id'] ?>";
						updataxhr.send(info);
					}
				})
				
			})
	</script>
</body>
</html>