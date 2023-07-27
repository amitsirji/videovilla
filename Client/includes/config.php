<?php
	
	$db_domain="localhost";
	$db_user="root";
	$db_password="";
	$db_name="videovilla";
	
	$con = mysqli_connect($db_domain,$db_user,$db_password,$db_name) or die('Connection not establish');
	//mysql_select_db($db_name,$con) or die('Database not found');
	
?>