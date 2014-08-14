<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");
	
	if(!isset($POST['id'])){
		$query = "INSERT INTO categories (name) VALUES ('".$_POST['name']."')";
				
		//echo $query; die;
		mysql_query($query,$conn);
		echo $_POST['name'].' added <br/>';
	}		
	mysql_close($conn);
	header("Location: list_category.php");
?>
<html>
	<head><title>Create category</title></head>
	<body>
		Add new category successfully. <br/>
		Click <a href="list_category.php">here</a> to view all category or click <a href="form_category.php">here</a> to add more.
	</body>
</html>