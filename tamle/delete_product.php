<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	if(!isset($_GET['id'])){
		echo 'No user found';
		die();
	}
	$user_id=$_GET['id'];
	$result = "DELETE FROM products WHERE id= ".$user_id;
	mysql_query($result);
	mysql_close($conn);
	header("location:list_product.php");
?>