<?php
//当有修改的数据时
	if(@$_GET['YUp']){
	$upname=$_GET['YUp'];
	$str="'";
	foreach($conn1->query("SELECT * FROM `test` WHERE `username`='".$upname."'") as $upsline){}
	if(@$upsline){
		switch($upsline['mo']){
			case 0:$mo='<option selected>天数</option>
                        <option >流量</option>
                        <option >混合</option>';break;
			case 1:$mo='<option >天数</option>
                        <option selected>流量</option>
                        <option >混合</option>';break;
			case 2:$mo='<option >天数</option>
                        <option >流量</option>
                        <option selected>混合</option>';break;
		}
		switch($upsline['zxzt']){
			case 1:$zxzt='<option selected>在线</option>
                        <option >离线</option>';break;
			case 0:$zxzt='<option >在线</option>
                        <option selected>离线</option>';break;
		}
		switch($upsline['start']){
			case 1:$start='<option selected>激活</option>
                        <option >未激活</option>';break;
			case 0:$start='<option >激活</option>
                        <option selected>未激活</option>';break;
		}
		switch($upsline['active']){
			case 1:$active='<option selected>正常</option>
                        <option >锁定</option>';break;
			case 0:$active='<option >正常</option>
                        <option selected>锁定</option>';break;
		}
		echo '<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">修改用户</div>
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
                      提示：请注意，书生脚本密码是通过函数文件加密了的，由于有时候更新密码可能会导致无法登录，所以暂时不开放密码修改。
                                          </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">用户名</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="upusername" class="form-control" value="'.$upsline['username'].'" placeholder="数据库地址">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">密码</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="'.$upsline['password'].'" name="uppassword" class="form-control" placeholder="数据库账号">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">模式</label>
                                  <div class="col-lg-8">
                                  <select name="upmo" class="form-control">
                                      '.$mo.'
                                    </select>
                                    </div>
                                </div>
                                    
                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">总共流量</label>
                                  <div class="col-lg-8">
                                    <input type="text" value="'.floor($upsline['quota']/1024/1024).'" name="upquota" class="form-control" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">已用流量</label>
                                  <div class="col-lg-8">
                                      <input type="text" disabled value="'.floor($upsline['now']/1024/1024).'" class="form-control" >
                                  </div>
                                </div> 
                                
								<div class="form-group">
                                  <label class="col-lg-4 control-label">上次使用</label>
                                  <div class="col-lg-8">
                                    <input type="text" disabled value="'.($upsline['downdata']/1024/1024).'" class="form-control" >
                                  </div>
                                </div>
								
								 <div class="form-group">
                                  <label class="col-lg-4 control-label">剩余天数</label>
                                  <div class="col-lg-8">
                                  <input type="text" value="'.$upsline['zq'].'" name="upzq" class="form-control">
                                  </div>
                                </div> 
                                
                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">在线状态</label>
                                  <div class="col-lg-8">
                                    <select disabled name="upzxzt" class="form-control">
                                      '.$zxzt.'
                                    </select>
                                  </div>
                                </div> 
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">激活状态</label>
                                  <div class="col-lg-8">
                                    <select name="upstart" class="form-control">
                                      '.$start.'
                                    </select>
                                  </div>
                                </div> 
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">锁定状态</label>
                                  <div class="col-lg-8">
                                    <select name="upactive" class="form-control">
                                      '.$active.'
                                    </select>
                                  </div>
                                </div>  
                                                        
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="upusers" class="btn btn-success">更新账户</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div>  

            ';
	
		}
else{
	echo '<script type="text/javascript">alert("没有该用户，请返回查看是否存在！");
					setTimeout('.$str.'location="?User=Line"'.$str.',2000);</script>';
}
	
	 } 
 
	
?>