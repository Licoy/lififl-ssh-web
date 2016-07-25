<?php
//线路管理
require("Include/Isstart.php");
require("Include/Islog.php");
require("Include/IsAdmin.php");
require("Include/ini.php");
require("Include/connect.php");
$title="线路管理";
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
            	<!--修改-->
<?php require("BackVerify/User-Line-Up.php"); ?>
            	
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">线路管理</div>
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
                     	<?php
                     		foreach($conn->query("SELECT COUNT(id) FROM `line`") as $scount){}
							if($scount['0']==0){
								echo '<div class="alert alert-success">
                     			 提示：你当前还未添加线路，请在下方进行添加线路！
                    			</div>';
							}
							else{
								echo '<div class="alert alert-success">
                     			 提示：如果要更换服务器请先删除本页面的线路，否则会无法连接到服务器端继而出现之后语句无法执行。
                    			</div>';
								echo '<table class="table table-striped table-hover table-responsive table-bordered">
											<thead>
                            <tr>
                              <th>线路地址</th>
                              <th>脚本类别</th>
                              <th>线路用户</th>
                              <th>当前在线</th>
                              <th>操作</th>
                            </tr>
                          </thead>
                           <tbody>
                           ';
                           foreach($conn->query("SELECT * FROM `line`") as $seline){
                           	//连接线路服务器进行查询
                           @$conn1 = new PDO('mysql:host='.$seline['sqlhost'].';port='.$seline['sqlport'].';dbname='.$seline['sqldata'].';charset=utf8', ''.$seline['sqlname'].'', ''.$seline['sqlpswd'].'');
                          		foreach(@$conn1->query("SELECT COUNT(username) FROM `test`") as $sctest){}
								foreach(@$conn1->query("SELECT COUNT(zxzt) FROM `test` WHERE `zxzt`=1") as $sczxzt){}
                           		echo '<tr>
                              <td>'.@$seline['sqlhost'].'</td>
                              <td>'.@$seline['sqlcat'].'</td>
                              <td>'.@$sctest['0'].'</td>
                              <td>'.@$sczxzt['0'].'</td>
                              <td><a type="button" name="update" href="?User=Line&Up='.$seline['id'].'" class="btn btn-default btn-sm">修改</a>
                              	<a type="button" name="delete" href="?User=Line&Del='.$seline['id'].'" class="btn btn-default btn-sm">删除</a></td>
                            </tr> ';
							//断开线路服务器连接
							@$conn1=NULL;
                           }
                            echo '</tbody></table>';
								
							}
							
							?>
                              </form>
                  </div>
                </div>
              </div>  

            </div>

          </div>
            	<!--
                	S
                -->
            	<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">线路添加</div>
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
                      提示：目前版本暂时只能兼容书生脚本的云免服务器，骚逼汪、吾爱等多版本将在下个版本推出！
                                          </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库地址</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sqlhost" class="form-control" placeholder="数据库地址">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库账号</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sqlname" class="form-control" placeholder="数据库账号">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库密码</label>
                                  <div class="col-lg-8">
                                    <input type="password" name="sqlpswd" class="form-control" placeholder="数据库密码">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库名</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sqldata" class="form-control" placeholder="数据库名">
                                  </div>
                                </div>
                                    
                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库端口</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="sqlport" class="form-control" placeholder="数据库端口">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">脚本类别</label>
                                  <div class="col-lg-8">
                                    <select name="sqlcat" class="form-control">
                                      <option>书生</option>
                                    </select>
                                  </div>
                                </div> 
                                                        
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="sqladd" class="btn btn-success">添加线路</button>
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
<?php require("BackVerify/User-Line-Del.php");?>
<script type="text/javascript">
			$(function(){
				$("button[name=sqladd]").click(function(){
					var sqlhost=$("input[name=sqlhost]").attr("value");
					var sqlname=$("input[name=sqlname]").attr("value");
					var sqlpswd=$("input[name=sqlpswd]").attr("value");
					var sqlport=$("input[name=sqlport]").attr("value");
					var sqldata=$("input[name=sqldata]").attr("value");
					var sqlcat=$("select[name=sqlcat]").attr("value");
					sqlpswd=encodeURIComponent(sqlpswd);
					if(sqlhost==""){
						myTips("数据库地址不能为空！","error");
						return false;
					}
					else if(sqlname==""){
						myTips("数据库用户名不能为空！","error");
						return false;
					}
					else if(sqlpswd==""){
						myTips("数据库密码不能为空！","error");
						return false;
					}
					else if(sqlport==""){
						myTips("数据库端口不能为空！","error");
						return false;
					}
					else if(sqldata==""){
						myTips("数据库实例不能为空！","error");
						return false;
					}
					else if(sqlcat==""){
						myTips("脚本类别不能为空！","error");
						return false;
					}
					else{
					var linexhr = new XMLHttpRequest();
					linexhr.onreadystatechange = function(){
						<?php echo loading("linexhr") ?>
						else if(linexhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(linexhr.responseText=="true"){
									myTips("恭喜你，线路添加成功","success");
									setTimeout('location="?User=Line"',2000);
								}
								else if(linexhr.responseText=="false"){
									myTips("很遗憾添加失败,原因未知！","error");
									return false;
								}
								else if(linexhr.responseText=="sumfalse"){
									myTips("线路额度上限！","error");
									return false;
								}
								else if(linexhr.responseText=="sqlfalse"){
									myTips("数据库已经有该线路，如需更改请到线路界面修改！","error");
									return false;
								}
								else if(linexhr.responseText=="sqlerror"){
									myTips("数据库无法连接，请验证后重新输入！","error");
									return false;
								}
							}
						}
						linexhr.open("POST","BackVerify/User-Line.php");
						linexhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "sqlhost="+sqlhost+"&sqlname="+sqlname+"&sqlpswd="+sqlpswd+
									"&sqldata="+sqldata+"&sqlcat="+sqlcat+"&sqlport="+sqlport;
						linexhr.send(info);
					}
				})
				
				//修改
				$("button[name=upline]").click(function(){
					var uphost=$("input[name=uphost]").attr("value");
					var upname=$("input[name=upname]").attr("value");
					var uppswd=$("input[name=uppswd]").attr("value");
					var upport=$("input[name=upport]").attr("value");
					var updata=$("input[name=updata]").attr("value");
					var upcat=$("select[name=upcat]").attr("value");
					uppswd=encodeURIComponent(uppswd);
					if(uphost==""){
						myTips("数据库地址不能为空！","error");
						return false;
					}
					else if(upname==""){
						myTips("数据库用户名不能为空！","error");
						return false;
					}
					else if(uppswd==""){
						myTips("数据库密码不能为空！","error");
						return false;
					}
					else if(upport==""){
						myTips("数据库端口不能为空！","error");
						return false;
					}
					else if(updata==""){
						myTips("数据库实例不能为空！","error");
						return false;
					}
					else if(upcat==""){
						myTips("脚本类别不能为空！","error");
						return false;
					}
					else{
					var linexhr = new XMLHttpRequest();
					linexhr.onreadystatechange = function(){
						<?php echo loading("linexhr") ?>
						else if(linexhr.readyState == 4){
								$("#ui-mask").remove();
								$("#change_loading").remove();
								if(linexhr.responseText=="true"){
									myTips("恭喜你，线路修改成功","success");
									setTimeout('location="?User=Line"',2000);
								}
								else if(linexhr.responseText=="false"){
									myTips("修改失败，可能是线路信息未发生任何改变！","error");
									return false;
								}
								else if(linexhr.responseText=="uperror"){
									myTips("数据库无法连接，请验证后重新输入！","error");
									return false;
								}
							}
						}
						linexhr.open("POST","BackVerify/User-Line-Up-V.php");
						linexhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "uphost="+uphost+"&upname="+upname+"&uppswd="+uppswd+
									"&updata="+updata+"&upcat="+upcat+"&upport="+upport+"&id=<?php echo @$id; ?>";
						linexhr.send(info);
					}
				})
				
			})
	</script>
</body>
</html>