<?php
	require("config.php");
    $conn = new PDO('mysql:host='.SQLHOST.';port='.SQLPORT.';dbname='.SQLBASE.';charset=utf8', ''.SQLUSER.'', ''.SQLPSWD.'',array(PDO::ATTR_PERSISTENT => true));
?>