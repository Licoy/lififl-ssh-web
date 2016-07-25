<?php
	if(isset($_GET['Add'])){
		
		
	?>
<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">添加云免账号</div>
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
                                  <label class="col-lg-4 control-label">用户名</label>
                                  <div class="col-lg-8">
                                   <input type="text" name="addusername" class="form-control" placeholder="云免账号用户名">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">密码</label>
                                  <div class="col-lg-8">
                                   <input type="password" name="addpassword" class="form-control" placeholder="云免账号密码">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">模式</label>
                                  <div class="col-lg-8">
                                   <select name="addmo" class="form-control">
                                   	<option>天数</option>
                                   	<option>流量</option>
                                   	<option>混合</option>
                                   </select>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">流量</label>
                                  <div class="col-lg-8">
                                   <input onkeyup="this.value=this.value.replace(/\D/g,'')" type="text" name="addquota" class="form-control" value="1024" placeholder="流量总额/单位:MB">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">天数</label>
                                  <div class="col-lg-8">
                                   <input onkeyup="this.value=this.value.replace(/\D/g,'')" type="text" name="addqz" class="form-control" value="30" placeholder="使用天数额度/单位:天">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">状态</label>
                                  <div class="col-lg-8">
                                   <select name="addstart" class="form-control">
                                   	<option>激活</option>
                                   	<option>未激活</option>
                                   </select>
                                  </div>
                                </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="addyun" class="btn btn-success">添加账号</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div> 
              <?php
	}
	?>
