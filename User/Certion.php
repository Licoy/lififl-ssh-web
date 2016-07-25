<?php
//身份认证
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/ini.php");
require("Include/connect.php");
$title="身份认证";
foreach($conn->query("SELECT * FROM `user` WHERE `id`=".$_SESSION['id']."") as $row){}
foreach($conn->query("SELECT `uid` FROM `certion` WHERE `uid`=".$_SESSION['id']."") as $sid){}
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
                  <div class="pull-left">身份认证</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <!-- Form starts.  -->
                    <?php
                    if($row['isCertion']==1){
                    	echo '<form class="form-horizontal" role="form">
                               <div class="alert alert-success">
                               	恭喜你，你的身份信息已经通过审核！请到个人资料进行查看！
                    			</div></form>';
                    }
					elseif(!@$sid){
                    	echo '<form class="form-horizontal" role="form">
                               <div class="alert alert-warning">
                               	提示：身份信息一旦审核就不可以再次更改！
                    </div>
                                                              
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">姓名</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="name" placeholder="请输入您的真实姓名" class="form-control" >
                                  </div>
                                </div>
                    			
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">QQ</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="qq" placeholder="请输入您的常用QQ" name="username" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">电话</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="phone" placeholder="请输入您的手机号码" name="oldpswd" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">身份号</label>
                                  <div class="col-lg-8">
                                    <input type="email" name="idcard" placeholder="请输入您的身份证号" name="useremail" class="form-control" >
                                  </div>
                                </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="certion" class="btn btn-success">提交审核</button>
                                  </div>
                                </div>
                              </form>';
                    }
							else{
							echo '<form class="form-horizontal" role="form">
                               <div class="alert alert-danger">
                               	提示：身份信息正在审核中，请耐心等待！
                    			</div></form>';
						}
                    	
                    	
                    	
                    	
                    ?>
                    	
                     
                  </div>
                </div>
             </div>  
           </div></div>
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
				$("button[name=certion]").click(function(){
					var name=$("input[name=name]").attr("value");
					var qq=$("input[name=qq]").attr("value");
					var phone=$("input[name=phone]").attr("value");
					var card=$("input[name=idcard]").attr("value");
					name=encodeURIComponent(name);
					if(name==""){
						myTips("姓名不能为空！","error");
						return false;
					}
					else if(qq==""){
						myTips("QQ不能为空！","error");
						return false;
					}
					else if(phone==""){
						myTips("手机不能为空！","error");
						return false;
					}
					else if(card==""){
						myTips("身份号不能为空！","error");
						return false;
					}
					else{
					var certionxhr = new XMLHttpRequest();
					certionxhr.onreadystatechange = function(){
						<?php echo loading("certionxhr") ?>
						else if(certionxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								str=certionxhr.responseText;
								if(str=="true"){
									myTips("身份信息提交成功，请等待管理员进行审核！","success");
									setTimeout('location="?User=Certion"',2000);
								}
								if(str=="cardfalse"){
									myTips("身份信息已经有人注册了，请重新输入！","error");
								}
								else if(str=="error"){
									myTips("提交失败","error");
								}
								else if(str=="false"){
									myTips("你已经提交过一次了，正在审核中，请等待！","error");
								}
							}
						}
						certionxhr.open("POST","BackVerify/User-Certion.php");
						certionxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "name="+name+"&qq="+qq+"&phone="+phone+"&idcard="+card+"&id=<?php echo $_SESSION['id'] ?>";
						certionxhr.send(info);
					}
				})
				
				
			})
	</script>
</body>
</html>