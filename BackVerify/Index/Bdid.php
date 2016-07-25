<?php
	if(isset($_GET['Bdid'])){
		echo '<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">绑定云免账号</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd statement">
                   <form class="form-horizontal" role="form">
                   <div class="form-group">
                                  <label class="col-lg-4 control-label">云免线路</label>
                                  <div class="col-lg-8">
                                   <select name="bdidline" class="form-control">';
								   //查询所有的云免线路
        	foreach(@$conn->query("SELECT `sqlhost` FROM `line` ") as $linesall){
        	echo '<option>'.$linesall['sqlhost'].'</option>';}
                               
                    echo                ' </select>
                                  </div>
                                </div>
                   
                   <div class="form-group">
                                  <label class="col-lg-4 control-label">云免账号</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="bdidname" class="form-control" placeholder="请输入您的云免账号" >
                                  </div>
                                </div>
                               
					 <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" name="bdidbutton" class="btn btn-success">绑定账号</button>
                                  </div>
                                </div> 
                  </form></div>
                </div>
              </div> ';
	}
?>
