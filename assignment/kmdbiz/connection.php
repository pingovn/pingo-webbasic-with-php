<?php
function connect(){
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("simple_login") or die("Could not select database");
	return $conn;
	}
 
?>