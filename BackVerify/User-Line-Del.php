<?php
	if(isset($_GET['Del'])){
		$id=$_GET['Del'];
		$str="'";
		foreach($conn->query("SELECT `id` FROM `line` WHERE `id`=".$id."") as $sdid){}
		if(@$sdid){
			$del=$conn->exec("DELETE FROM `line` WHERE `id`=".$id."");
			
			if($del){
				echo '<script type="text/javascript">myTips("删除成功！","success");
					setTimeout('.$str.'location="?User=Line"'.$str.',2000);</script>';
			}
			else{
				echo '<script type="text/javascript">myTips("删除失败！","error");
					setTimeout('.$str.'location="?User=Line"'.$str.',2000);</script>';
			}
		}
		else{
			echo '<script type="text/javascript">myTips("没有这条记录！","error");
					setTimeout('.$str.'location="?User=Line"'.$str.',2000);</script>';
		}
	}
	
	
	
?>