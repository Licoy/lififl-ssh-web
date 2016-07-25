<?php
	session_start();
	if(isset($_POST['lineselect'])){
		$_SESSION['lineselect']=$_POST['lineselect'];
		if(@$_SESSION['lineselect']!=''){
			echo "true";
		}
		else{
			echo "false";
		}
	}
	
	
?>