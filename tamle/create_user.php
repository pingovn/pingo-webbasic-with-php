<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("test") or die("Could not select database");
	
	if(isset($_POST['fullname'])){
		$query = "INSERT INTO users".
				"(fullname, email, age, gender)".
				"VALUES".
				"('".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['age']."', '".$_POST['gender']."')";
		mysql_query($query,$conn);
		echo 'Welcome '.$_POST['fullname'].'<br/>';
	}		
	mysql_close($conn);
	
?>
<html>
	<head><title>Create User</title></head>
	<body>
		Register new user successfully. <br/>
		Click <a href="list_user.php">here</a> to view all users or click <a href="return_form_user.php">here</a> to register more.
	</body>
</html>