<?php
	if(isset($_GET['Adds'])){
		
		
	?>
<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">批量添加云免账号</div>
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
                                  <label class="col-lg-4 control-label">账号个数</label>
                                  <div class="col-lg-8">
                                   <input type="text" name="addsnum" onkeyup="this.value=this.value.replace(/\D/g,'')" class="form-control" placeholder="生成的账号个数">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">模式</label>
                                  <div class="col-lg-8">
                                   <select name="addsmo" class="form-control">
                                   	<option>天数</option>
                                   	<option>流量</option>
                                   	<option>混合</option>
                                   </select>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">流量</label>
                                  <div class="col-lg-8">
                                   <input onkeyup="this.value=this.value.replace(/\D/g,'')" type="text" name="addsquota" class="form-control" value="1024" placeholder="流量总额/单位:MB">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">天数</label>
                                  <div class="col-lg-8">
                                   <input onkeyup="this.value=this.value.replace(/\D/g,'')" type="text" name="addszq" class="form-control" value="30" placeholder="使用天数额度/单位:天">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">状态</label>
                                  <div class="col-lg-8">
                                   <select name="addsstart" class="form-control">
                                   	<option>激活</option>
                                   	<option>未激活</option>
                                   </select>
                                  </div>
                                </div>
                                                              
                                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="addsyun" class="btn btn-success">批量生成</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
              </div> 
              <?php
	}
	?>
