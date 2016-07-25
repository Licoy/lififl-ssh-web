<?php
	if(@$_GET['Up']){
	$id=$_GET['Up'];
	$str="'";
	foreach($conn->query("SELECT * FROM `line` WHERE `id`=".$id."") as $sline){}
	if(@$sline){
		echo '<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">线路修改</div>
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
                      如果线路修改的不正确，那么线路管理页面可能会无法打开。不过在添加之前会进行验证，所以请不要随便关闭服务器导致数据库无法访问。
                                          </div>
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库地址</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="uphost" class="form-control" value="'.$sline['sqlhost'].'" placeholder="数据库地址">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库账号</label>
                                  <div class="col-lg-8">
                                    <input type="text" value="'.$sline['sqlname'].'" name="upname" class="form-control" placeholder="数据库账号">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库密码</label>
                                  <div class="col-lg-8">
                                    <input type="password" value="'.$sline['sqlpswd'].'" name="uppswd" class="form-control" placeholder="数据库密码">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库名</label>
                                  <div class="col-lg-8">
                                    <input type="text" value="'.$sline['sqldata'].'" name="updata" class="form-control" placeholder="数据库名">
                                  </div>
                                </div>
                                    
                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">数据库端口</label>
                                  <div class="col-lg-8">
                                    <input type="text" value="'.$sline['sqlport'].'" name="upport" class="form-control" placeholder="数据库端口">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">脚本类别</label>
                                  <div class="col-lg-8">
                                    <select name="upcat" class="form-control">
                                      <option>'.$sline['sqlcat'].'</option>
                                    </select>
                                  </div>
                                </div> 
                                                        
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="upline" class="btn btn-success">更新线路</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div>  

            ';
	
		}
else{
	echo '<script type="text/javascript">alert("没有这条线路，请返回查看是否存在！");
					setTimeout('.$str.'location="?User=Line"'.$str.',2000);</script>';
}
	
	 } 
 
	
?>