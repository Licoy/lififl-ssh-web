<?php
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/IsAdmin.php");
require("Include/ini.php");
require("Include/connect.php");
$title="用户管理";
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
            <?php include("User/script.php");?>
             <?php include("BackVerify/Users/Yun-Show-SeAdds.php")?>	
            <?php include("BackVerify/Users/Yun-Show-Adds.php")?>
            <?php include("BackVerify/Users/Yun-Show-Add.php")?>
            	<!--
                	表单
                -->
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">云免用户</div>
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
                               	提示：本框内容为云免服务器的所有用户。
                               	<br />
                               	提示：默认显示第一条线路的用户，第一条线路为第一个添加的线路。
                    </div>
                    <?php include("BackVerify/Users/Yun-Show-Lines.php") ?>
					<input name="seacontent" onkeydown="if(event.keyCode==13){return false;}" type="text" class="sou form-control" placeholder="输入用户名搜索">
					<button name="search" type="button" class="btn btn-warning">搜索用户</button>
                    <button name="addusers" type="button" class="btn btn-success">添加用户</button>
                    <button name="addszh" type="button" class="soend btn btn-success">批量添加用户</button>
                    <br />
                    <?php
                    	include("BackVerify/Users/Yun-Show-Users.php");
						include("BackVerify/Users/Yun-Show-Search.php");
                    	?>
                      
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
<script src="template/js/custom.js"></script> <!-- Custom codes -->
<script type="text/javascript">
			$(function(){
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
				//搜索
				$("button[name=search]").click(function(){
					var con=$("input[name=seacontent]").attr("value");
					con=con.trim(con);
					con=encodeURIComponent(con);
					if(con==""){
						myTips("搜索内容不能为空！","error");
						return false;
					}
					else{
					location='?User=Users&Search='+con;
					}
				})
				//选择线路
				$("button[name=linesebtn]").click(function(){
					var lines=$("select[name=linese]").val();
					var linexhr = new XMLHttpRequest();
					linexhr.onreadystatechange = function(){
						<?php echo loading("linexhr") ?>
						else if(linexhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(linexhr.responseText=="true"){
									myTips("线路选择成功！","success");
									setTimeout('location="?User=Users"',2000);
								}
								else if(linexhr.responseText=="false"){
									myTips("很遗憾，线路选择失败！","error");
									return false;
								}
							}
						}
						linexhr.open("POST","BackVerify/Users/Yun-Show-Select.php");
						linexhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "lineselect="+lines;
						linexhr.send(info);
				})
				//添加账号
				$("button[name=addyun]").click(function(){
					var addusername=$("input[name=addusername]").attr("value");
					var addpassword=$("input[name=addpassword]").attr("value");
					var addquota=$("input[name=addquota]").attr("value");
					var addqz=$("input[name=addqz]").attr("value");
					var addstart=$("select[name=addstart]").val();
					var addmo=$("select[name=addmo]").val();
					addusername=addusername.trim(addusername);
					addpassword=addpassword.trim(addpassword);
					addquota=addquota.trim(addquota);
					addqz=addqz.trim(addqz);
					addusername=encodeURIComponent(addusername);
					addpassword=encodeURIComponent(addpassword);
					if(addusername==''){
						myTips("云免账号不能为空！","error");
					}
					else if(addpassword==''){
						myTips("云免密码不能为空！","error");
					}
					else if(addquota==''){
						myTips("流量不能为空！","error");
					}
					else if(addqz==''){
						myTips("天数不能为空！","error");
					}
					else{
					var addxhr = new XMLHttpRequest();
					addxhr.onreadystatechange = function(){
						<?php echo loading("addxhr") ?>
						else if(addxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(addxhr.responseText=="true"){
									myTips("账号添加成功！","success");
									setTimeout('location="?User=Users"',2000);
								}
								else if(addxhr.responseText=="isfalse"){
									myTips("已经有该账号！","error");
								}
								else if(addxhr.responseText=="linefalse"){
									myTips("请先确定选择线路！","error");
								}
								else{
									myTips("添加失败！","error");
								}
							}
						}
						addxhr.open("POST","BackVerify/Users/Yun-Show-Add-V.php");
						addxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "addusername="+addusername+"&addpassword="+addpassword+"&addquota="+
							addquota+"&addqz="+addqz+"&addstart="+addstart+"&addmo="+addmo;
						addxhr.send(info);
					}
				})
				//添加账号点击
				$("button[name=addusers]").click(function(){
						location="?User=Users&Add=Add";
				})
				//更新账号
				$("button[name=upusers]").click(function(){
					var upusername=$("input[name=upusername]").attr("value");
					var upquota=$("input[name=upquota]").attr("value");
					var upzq=$("input[name=upzq]").attr("value");
					var upmo=$("select[name=upmo]").val();
					var upstart=$("select[name=upstart]").val();
					var upactive=$("select[name=upactive]").val();
					upusername=upusername.trim(upusername);
					upquota=upquota.trim(upquota);
					upzq=upzq.trim(upzq);
					upusername=encodeURIComponent(upusername);
					if(upusername==''){
						myTips("云免账号不能为空！","error");
					}
					else if(upquota==''){
						myTips("云免流量额不能为空！","error");
					}
					else if(upzq==''){
						myTips("云免天数不能为空！","error");
					}
					else{
					var upxhr = new XMLHttpRequest();
					upxhr.onreadystatechange = function(){
						<?php echo loading("upxhr") ?>
						else if(upxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(upxhr.responseText=="true"){
									myTips("修改信息成功！","success");
									setTimeout('location="?User=Users"',2000);
								}
								else if(upxhr.responseText=="isfalse"){
									myTips("不存在该账户！","error");
								}
								else if(upxhr.responseText=="linefalse"){
									myTips("请先确定选择线路！","error");
								}
								else{
									myTips("修改失败！","error");
								}
							}
						}
						upxhr.open("POST","BackVerify/Users/Yun-Show-Up-V.php");
						upxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "upusername="+upusername+"&upquota="+upquota+"&upzq="+
							upzq+"&upmo="+upmo+"&upstart="+upstart+"&upactive="+upactive+"&oldname=<?php echo @$_GET['YUp']?>";
						upxhr.send(info);
					}
				})
				//进入批量添加页面
				$("button[name=addszh]").click(function(){
					location="?User=Users&Adds=Adds";
				})
				//批量添加账号
				$("button[name=addsyun]").click(function(){
					var addsnum=$("input[name=addsnum]").attr("value");
					var addsquota=$("input[name=addsquota]").attr("value");
					var addszq=$("input[name=addszq]").attr("value");
					var addsmo=$("select[name=addsmo]").val();
					var addsstart=$("select[name=addsstart]").val();
					addsnum=addsnum.trim(addsnum);
					addsquota=addsquota.trim(addsquota);
					addszq=addszq.trim(addszq);
					if(addsnum==''){
						myTips("添加账号数量不能为空！","error");
					}
					else if(addsquota==''){
						myTips("云免流量额不能为空！","error");
					}
					else if(addszq==''){
						myTips("云免天数不能为空！","error");
					}
					else{
					var addsxhr = new XMLHttpRequest();
					addsxhr.onreadystatechange = function(){
						<?php echo loading("addsxhr") ?>
						else if(addsxhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(addsxhr.responseText=="true"){
									myTips("账号生成成功！","success");
									setTimeout('location="?User=Users&SeAdds=SeAdds"',2000);
								}
								else if(addsxhr.responseText=="linefalse"){
									myTips("请先确定选择线路！","error");
								}
								else if(addsxhr.responseText=="notisrid"){
									myTips("没有Randid目录或没有写入权限！","error");
								}
								else if(addsxhr.responseText=="false"){
									myTips("账号生成失败！","error");
								}
							}
						}
						addsxhr.open("POST","BackVerify/Users/Yun-Show-Adds-V.php");
						addsxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "addsnum="+addsnum+"&addsquota="+addsquota+"&addszq="+
							addszq+"&addsmo="+addsmo+"&addsstart="+addsstart;
						addsxhr.send(info);
					}
				})
			})
	</script>
</body>
</html>