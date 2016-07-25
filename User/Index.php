<?php
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/ini.php");
require("Include/connect.php");
$title="用户中心";
foreach($conn->query("SELECT COUNT(*) FROM `notice`") as $notcount){}
foreach($conn->query("SELECT * FROM `notice` WHERE `id`=".$notcount['0']."") as $notice){}
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
		  <a href="index.html" class="navbar-brand hidden-lg">首页</a>
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
              <i class="icon-user"></i><?php echo $_SESSION['username'] ?><b class="caret"></b>              
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
		<?php require("User/script.php");?>


 <!-- Matter -->
	    <div class="matter">
        <div class="container">
          <div class="row">
          	
            <div class="col-md-12">
            	<!--
                	公告
                -->
                <? require("BackVerify/Index/Bdid.php") ?>
            	<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">公告</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd statement">
                    <p><?php echo $notice['content'];?></p>
                    <span class="label label-success"><?php echo date("Y-m-d H:i:s",$notice['notdate'])?></span>
                  </div>
                </div>
             </div>  
            </div>
          </div>
            	<!--公告 END-->
            			<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">云免信息</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd statement">
                  	<form class="form-horizontal" role="form">
              <?php require("BackVerify/Index/Index.php")  ?>

            </div>
          </div>
          <!-- Dashboard graph ends -->

    </div>
   <!-- Mainbar ends -->
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
<script src="template/js/custom.js"></script>
<script type="text/javascript">
	$(function(){
		$("button[name=bangdingid]").click(function(){
			location="?User=Index&Bdid=Bdid";
		})
		
		$("button[name=bdidbutton]").click(function(){
			var bdidname=$("input[name=bdidname]").attr("value");
			var bdidline=$("select[name=bdidline]").val();
			if(bdidname==''){
				myTips("云免账号不能为空！","error");
			}
			else{
				var dbidxhr = new XMLHttpRequest();
					dbidxhr.onreadystatechange = function(){
						<?php echo loading("dbidxhr") ?>
						else if(dbidxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(dbidxhr.responseText=="true"){
									myTips("账号绑定成功！","success");
									setTimeout('location="?User=Index"',2000);
								}
								else if(dbidxhr.responseText=="nameerror"){
									myTips("该线路不存在该账户！","error");
								}
								else if(dbidxhr.responseText=="false"){
									myTips("账号绑定失败！","error");
								}
							}
					}
						dbidxhr.open("POST","BackVerify/Index/Bdid-V.php");
						dbidxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "bdidname="+bdidname+"&bdidline="+
							bdidline+"&bduserid=<?php echo $_SESSION['id']?>";
						dbidxhr.send(info);
						
			}
		})
		
		
	})
</script>
</body>
</html>