<?php
include("fun.php");
	$conn = connect();

if (!isset($_POST['id_comment'])) {
    echo "No comment found.";
    die();
}
	$comment_id = $_POST['id_comment'];
	
	$query2 = "DELETE  FROM comment WHERE id = " . $comment_id;

	$query1 = "SELECT * FROM comment WHERE id = " . $comment_id;
	mysql_query($query1,$conn);	
	mysql_query($query2,$conn);		
	$result = mysql_query($query1,$conn);
	

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