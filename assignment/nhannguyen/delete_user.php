<?php
include("fun.php");
	$conn = connect();

if (!isset($_POST['username'])) {
    echo "No user found.";
    die();
}
	$username = $_POST['username'];
	$query1 = "DELETE  FROM user WHERE username = '" . $username."'";
	$query2 = "DELETE  FROM comment WHERE user = " . $username;

	$query = "SELECT * FROM user WHERE username = '" . $username ."'";
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
<p class="text" align="center">You want <a href="form_user.php">add user</a>or <a href="list_user.php">list user </p>
</body>
</html>
<?
mysql_close($conn);
?>