<?php
	if(@$_GET['Search']){
	$name=$_GET['Search'];
	$str="'";
	foreach($conn1->query("SELECT `username` FROM `test` WHERE `username`='".$name."'") as $seatest){}
	if(@$seatest){
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
			foreach($conn1->query("SELECT * FROM `test` WHERE `username`='".$name."'") as $seauser){
				//判断计费模式
			$mo=$seauser['mo'];
			if($mo=='0'){
				$mostr="天数";
			}
			elseif($mo=="1"){
				$mostr="流量";
			}
			else{
				$mostr="混合";
			}
			//判断状态
			$zt=$seauser['zxzt'];
			if($zt=='0'){
				$ztstr='<span class="label label-default">离线</span>';
			}
			else{
				$ztstr='<span class="label label-success">在线</span>';
			}
			//统计剩余流量
			$zong=floor($seauser['quota']/1024/1024);
			$old=floor($seauser['now']/1024/1024);
			$now=$zong-$old;
			$p=strpos($_SERVER['QUERY_STRING'],"Page");
			if($p){
				$ypag=$_GET['Page'];
				$ydel="?User=Users&Page=".$ypag;
			}
			else{
				$ydel="?User=Users";
			}
				echo 	'<td>'.$seauser['username'].'</td>
                          <td>'.$mostr.'</td>
                          <td>'.$now.'</td>
                          <td>'.$seauser['zq'].'</td>
                          <td>'.$ztstr.'</td>
                          <td>
                              <a href="'.$ydel.'&YUp='.$seauser['username'].'" class="btn btn-xs btn-default"><i class="icon-pencil"></i> </a>
                              <a href="'.$ydel.'&YDel='.$seauser['username'].'" class="btn btn-xs btn-default"><i class="icon-remove"></i> </a>

                          </td></tr>';
			}
							 echo '</tbody>
		                    </table>';
	 }
	else{
		echo '<script type="text/javascript">myTips("没有该用户，请返回重新查找！","error");</script>';
	}
	}
?>