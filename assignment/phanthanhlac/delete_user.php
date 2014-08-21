<?php
    include 'db/dbconnect.php';
            $conn = connect();

    if (!isset($_POST['id'])) {
        echo "No user found.";
        die();
    }
	$user_id = $_POST['id'];
	$sql_user = "DELETE  FROM users WHERE id = " . $user_id;
	//$sql_comment = "DELETE  FROM comment WHERE user_id = " . $user_id;

	$query = "SELECT * FROM user WHERE id = " . $user_id;
	mysql_query($sql_user,$conn);	
	//mysql_query($sql_comment,$conn);		
	$result = mysql_query($query,$conn);
	
?>

<html>
    <head>
        <title>Delete user</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <p align ="center" style="font-size: 20px;font-weight: bold;color: #ff0000">Successfully removed !!
            <?php           
                header( "refresh:2;url=list_users.php" );
            ?>
        
    </p>
 
    </body>
</html>
<?php
    mysql_close($conn);
?>