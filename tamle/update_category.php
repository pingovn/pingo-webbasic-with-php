<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	if(!isset($_POST['id'])){	
		die();
	}
	if(isset($_POST['id'])){
		$name=$_POST['name'];
		$cat_id=$_POST['id'];

		$query = "UPDATE categories SET name='$name' WHERE id='$cat_id' ";
		//echo $query; die();
		//var_dump($query); die();
		$result=mysql_query($query);
		mysql_free_result($result);
		
	}
	
	header("Location: view_category.php?id=" .$cat_id);
	exit();
	mysql_close($conn);
?>