<?php
require("Include/Isstart.php");
require("Include/ini.php");
if(isset($_SESSION['username']) && isset($_SESSION['userpswd'])){
	echo '<script type="text/javascript">location="IndexIng.php?User=Index"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php include("Include/header.php") ?>
  <title>找回密码 - <?php echo SITENAME ?></title> 
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> 找回密码 - <?php echo SITENAME ?>
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" action="" method="post">
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">邮箱</label>
                      <div class="col-lg-9">
                        <input disabled type="text" name="forgotemail" class="form-control" id="inputEmail" placeholder="此功能暂未完善">
                      </div>
                    </div>
                        <div class="col-lg-9 col-lg-offset-2">
							<button type="button" class="btn btn-danger">立即找回密码</button>
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  <center><a href="IndexIng.php?Start=Login">想起密码?返回登录</a></center>
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
					var email=$("input[name=forgotemail]").attr("value");
					email=encodeURIComponent(email);
					if(email==""){
						Confirm.show('提示', '邮箱不能为空！');
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
										Confirm.show('提示', '已经发送邮件到该邮箱，请注意查收！');
									}
									else if(xhr.responseText=="emailfalse"){
										Confirm.show('提示', '该邮箱不存在！');
										return false;
									}
							}
						}
						xhr.open("POST","Verify/forGotVerify.php");
						xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						var info = "forgotemail="+email;
						xhr.send(info);
					}
				})
				
		})
	</script>
</body>
</html>