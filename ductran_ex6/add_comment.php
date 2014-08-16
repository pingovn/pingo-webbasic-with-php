<?php

include("fun.php");
	$conn = connect();
 
         
        
	$query = "INSERT INTO comment".
		"(author, comment, user_id)".
			"VALUES".
			"('".$_POST['yourname']."', '".$_POST['yourcomment']."', '".$_POST['user_id']."')";

//    var_dump($query); die();
	mysql_query($query,$conn);
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
<div id="" align = "center">
	<p><?php echo $_POST['yourname']?> has successfully post  </p>
	<p>You want <a href="form_user.php">Register User</a>  </p>
	<p>You want <a href="list_user.php">go to list user</a></p>

</div>
</body>


</html>