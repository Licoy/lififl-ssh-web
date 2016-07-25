<?php
//当有删除的数据时
	if(isset($_GET['YDel'])){
		$name=$_GET['YDel'];
		foreach($conn1->query("SELECT `username` FROM `test` WHERE `username`='".$name."'") as $sdid){}
		if(@$sdid){
			$del=$conn1->exec("DELETE FROM `test` WHERE `username`='".$name."'");
			if($del){
				echo '<script type="text/javascript">myTips("删除成功！","success");</script>';
			}
			else{
				echo '<script type="text/javascript">myTips("删除失败！","error");</script>';
			}
		}
		else{
			echo '<script type="text/javascript">myTips("没有这条记录！","error");</script>';
		}
	}
	
	
	
?>