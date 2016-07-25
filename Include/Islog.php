<?php
	require("Include/Isstart.php");
	if(@$_SESSION['username']==''){
		echo '<script type="text/javascript">location="IndexIng.php?Start=Login";</script>';
	}
?>