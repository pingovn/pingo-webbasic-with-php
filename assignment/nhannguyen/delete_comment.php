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
	 <div align = "center" style="font-size :45px;">
        <?php echo  $text_pingo ?>
    </div>
    <div align = "center" style="font-size :25px;">
        <?php echo  $text_info ?>
    </div>
    <div class ="menuform">
        <ul class="topnav">
            <li>
                <a href="list_user.php">List User</a>
            </li>   
            <li>
                <a href="form_user.php">Create User</a>
            </li>   
            <?php 
            if (isset($_SESSION['username'])) {?>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            <?php }else {?>
                <li>
                    <a href="login.php">Login</a>
                </li>
            <?php } ?>
            
        </ul>   
    </div>
<p align ="center" class="text">
	<?if (mysql_num_rows($result) == '')
		{
			echo "Successfully removed";
		}
		else echo "Unsuccessfully removed";
	?>
</p>

</body>
</html>
<?
mysql_close($conn);
?>