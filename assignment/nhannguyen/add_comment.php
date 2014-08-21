<?php

include("fun.php");
	$conn = connect();
 
 if(isset($_SESSION['username'])&&$_SESSION['username']!=NULL)        
 {       
	$query = "INSERT INTO comment".
		"(user_author, user, comment)".
			"VALUES".
			"('".$_SESSION['username']."', '".$_POST['user_id']."', '".$_POST['yourcomment']."')";

	mysql_query($query,$conn);
}else
{
	header("Location: login.php?msg=Ban can phai dang nhap");
}
	mysql_close($conn);
?>
<html>
<head>
<title>Post Comment</title>
<meta charset="utf-8"/>
<style type="text/css">

#content{
padding: 20px;
}
</style>
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
<div id="" align = "center">
	<p><?php echo $_POST['user_id']?> has successfully post  </p>
	<p>You want <a href="form_user.php">Register User</a>  </p>
	<p>You want <a href="list_user.php">go to list user</a></p>

</div>
</body>


</html>