<?php
//签到
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/ini.php");
require("Include/connect.php");
$title="签到";
foreach($conn->query("SELECT * FROM `user` WHERE `id`=".$_SESSION['id']."") as $row){}
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
                  <div class="pull-left">每日签到</div>
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
                               	提示：签到所得到的金币将会存在您的账户里面，你可以进行兑换流量或者增加天数！
                    </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <center><button type="button" name="singin" class="btn btn-success">立即签到</button></center>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
             </div>  
         
         <!--
                	表单
                -->
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">物品兑换</div>
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
                               <div class="alert alert-info">
                               	提示：你当前还有<span class="label label-default"><?php echo $row['userGold']?></span>个金币
                    </div>
                    			 <table class="table table-striped table-hover table-responsive table-bordered">
											<thead>
                            <tr>
                              <th>物品名称</th>
                              <th>所需金币</th>
                              <th>剩余数量</th>
                              <th>操作</th>
                            </tr>
                          </thead>
                           <tbody>
                            <tr>
                              <td>100MB流量</td>
                              <td>200</td>
                              <td>20</td>
                              <td><button type="button" name="dh" class="btn btn-default btn-sm">兑换</button></td>
                            </tr> 
                          </tbody>
                       </table>
                              </form>
                  </div>
                </div>
             </div>  </div>
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
				$("button[name=singin]").click(function(){
					var singinxhr = new XMLHttpRequest();
					singinxhr.onreadystatechange = function(){
						<?php echo loading("singinxhr") ?>
						else if(singinxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								str=singinxhr.responseText;
								if(str=="oldsing"){
									myTips("你已经签到过了，请24小时之后再来签到吧","error");
								}
								else if(str=="error"){
									myTips("很遗憾，签到失败","error");
								}
								else if(str!="oldsing" && str!="error"){
									myTips("恭喜你，获得"+str+"枚金币！","success");
									setTimeout('location="?User=Signin"',2000);
								}
							}
						}
						singinxhr.open("POST","BackVerify/User-Signin.php");
						singinxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "singin=true&id=<?php echo $_SESSION['id'] ?>";
						singinxhr.send(info);
				})
				
				
			})
	</script>
</body>
</html>