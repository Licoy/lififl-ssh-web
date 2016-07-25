<?php
	if(isset($_GET['Lines'])){
	}
	else{
   		/*判断是否有删除操作*/
		require("Yun-Show-Del.php");
		/*判断是否有修改操作*/
		require("Yun-Show-Up.php");
		//进行分页
		$pagesize=10;//每一页显示多少用户
		if(isset($_GET['Page'])&&$_GET['Page']!='')
		$page=$_GET['Page'];
		else $page=0;
		//统计所有用户数量
		$sql="select count(username) from `test`";
		foreach($conn1->query($sql) as $numRecord){}
		//分页的页数
		$totalpage = ceil($numRecord['0']/$pagesize);
		$recordSql = "SELECT * FROM `test` ORDER BY `username` DESC LIMIT ".($page*$pagesize).",".$pagesize;
		foreach(@$conn1->query($recordSql) as $suser){
			//判断计费模式
			$mo=$suser['mo'];
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
			$zt=$suser['zxzt'];
			if($zt=='0'){
				$ztstr='<span class="label label-default">离线</span>';
			}
			else{
				$ztstr='<span class="label label-success">在线</span>';
			}
			//统计剩余流量
			$zong=floor($suser['quota']/1024/1024);
			$old=floor($suser['now']/1024/1024);
			$now=$zong-$old;
			$p=strpos($_SERVER['QUERY_STRING'],"Page");
			if($p){
				$ypag=$_GET['Page'];
				$ydel="?User=Users&Page=".$ypag;
			}
			else{
				$ydel="?User=Users";
			}
			echo '<td>'.$suser['username'].'</td>
                          <td>'.$mostr.'</td>
                          <td>'.$now.'</td>
                          <td>'.$suser['zq'].'</td>
                          <td>'.$ztstr.'</td>
                          <td>
                              <a href="'.$ydel.'&YUp='.$suser['username'].'" class="btn btn-xs btn-default"><i class="icon-pencil"></i> </a>
                              <a href="'.$ydel.'&YDel='.$suser['username'].'" class="btn btn-xs btn-default"><i class="icon-remove"></i> </a>

                          </td></tr>';
						  
		}
	}
	
	
	
	
?>