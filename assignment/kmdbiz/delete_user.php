<?php
include("connection.php");
	$conn = connect();

if (!isset($_POST['id_delete'])) {
    echo "No user found.";
    die();
}
	$user_id = $_POST['id_delete'];
	$query1 = "DELETE  FROM user WHERE id = " . $user_id;
	$query2 = "DELETE  FROM comment WHERE user_id = " . $user_id;

	$query = "SELECT * FROM user WHERE id = " . $user_id;
	mysql_query($query1,$conn);	
	mysql_query($query2,$conn);		
	$result = mysql_query($query,$conn);
	

?>

<html>
<head>
<title>Delete user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
<p align ="center" class="text">
	<?if (mysql_num_rows($result) == '')
		{
			echo "Successfully removed";
		}
		else echo "Unsuccessfully removed";
	?>
</p>
<p class="text" align="center">You want <a href="form_user.php">add user</a>or <a href="list_user.php">list user </p>
</body>
</html>
<?
mysql_close($conn);
?>