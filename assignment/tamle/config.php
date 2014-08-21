<?php
	$conn=mysql_connect("localhost","root","root") or die("Could not connect to database");
	mysql_select_db("final") or die("Could not select database");
	return $conn;
?>