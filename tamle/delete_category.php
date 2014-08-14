<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	if(!isset($_GET['id'])){
		echo 'No category found';
		die();
	}
	$cat_id=$_GET['id'];
	$result = "DELETE FROM category WHERE id= ".$cat_id;
	mysql_query($result);
	mysql_close($conn);
	header("location:list_category.php");
?>