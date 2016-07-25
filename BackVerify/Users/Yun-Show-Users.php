<?php
if(!isset($_GET['Search'])){
                    		echo '<table class="table table-striped table-bordered table-hover">
		                      <thead>
		                        <tr>
		                          <th>用户名</th>
		                          <th>模式</th>
		                          <th>剩余流量</th>
		                          <th>剩余天数</th>
		                          <th>状态</th>
		                          <th>操作</th>
		                        </tr>
		                      </thead>
		                      <tbody>';
							 include("BackVerify/Users/Yun-Show.php");
							 echo '</tbody>
		                    </table>
		                    <ul class="pagination">';
							echo '<li><a href="?User=Users&Page=0">首页</a></li>';
	                    	if($page>0) echo '<li><a href="?User=Users&Page='.($page-1).'">上一页</a></li>';
							else{echo '<li class="am-disabled"><a href="#">上一页</a></li>';} 
							echo '<li><a>'.($page+1).'/'.$totalpage.'</a></li>';
							if($page<$totalpage-1) echo '<li><a href="?User=Users&Page='.($page+1).'">下一页</a></li>' ; 
							else{echo '<li class="am-disabled"><a href="#">下一页</a></li>';}
							echo '<li><a href="?User=Users&Page='.($totalpage-1).'">尾页</a></li>';
							echo'</ul>';
							}
?>