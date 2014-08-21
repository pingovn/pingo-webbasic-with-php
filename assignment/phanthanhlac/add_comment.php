<?php
    session_start();
    if(isset($_SESSION['username'])) {
        include("db/dbconnect.php");
        $conn = connect();
        $post = $_POST;
        $sql = "INSERT INTO comments".
                "(author, comment, user_id)".
                        "VALUES".
                        "('".$_SESSION['username']."', '".$post['yourcomment']."', '".$post['user_id']."')";

        //    var_dump($query); die();
                mysql_query($sql,$conn);
                mysql_close($conn);
    }
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
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="" align = "center">
	<p><?php echo $_SESSION['username']?> has successfully post  </p>
	<p>You want <a href="form_user.php">Register User</a>  </p>
	<p>You want <a href="list_user.php">go to list user</a></p>

</div>
</body>


</html>