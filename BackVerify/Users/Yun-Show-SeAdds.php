<?php
	if(isset($_GET['SeAdds'])){
		
		
	?>
<div class="widget">
                 <div class="widget-head">
                  <div class="pull-left">批量账号查询</div>
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
                               	提示：生成的账号已经记录在根目录下的Randid文件夹下的<?php echo $_SESSION['datetxt'].".txt" ?>文件里，
                               	可以到该文件进行查看。
                    </div>  
                    <div class="alert alert-danger">
                             <?php
                             	$datetxtstr=file_get_contents("Randid/".$_SESSION['datetxt'].".txt");
								echo $datetxtstr;
                             	
                             	?>
                             	</div>  
                              </form>
                  </div>
                </div>
              </div> 
              <?php
	}
	?>
