<?php
	$url ='';
	 if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
                $path = "data/"; 
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type']; 
                $size = $_FILES['file']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
                $url= $path.$name;  
           
        }

	include("fun.php");
	$conn = connect();

	if (!isset($_POST['id'])) {
  	  echo "No user found.";
  	  die();
	}

	$user_id = $_POST['id'];
	$query1 = "SELECT * FROM user WHERE id = " . $user_id;
	$result1 = mysql_query($query1,$conn);

	if (mysql_num_rows($result1) == 0) {
 	   echo "No user found.";
    	die();
	}
	$rows = mysql_fetch_array( $result1);

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$gender =$_POST['gender'];
	$opcupation = $_POST['opcupation'];

	if(strcmp('', $url)==0)
	{
		$url = $rows['avatar'];
	}
	$update = "UPDATE user SET fullname = '" .$fullname."',email = '".$email ."',age = '".$age."',gender ='".$gender."',opcupation ='".$opcupation."', avatar ='".$url."' WHERE id = ".$user_id;
	
	 mysql_query($update,$conn);
	
?>

<html>
<head>
<title>Edit user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
<p align = "center">Successfully user </a></p>
<p align = "center">You want <a href="list_user.php">go to list user</a></p>
<p align = "center">You want <a href="form_user.php">Register User</a></p>
</body>
</html>
<?
mysql_close($conn);
?>