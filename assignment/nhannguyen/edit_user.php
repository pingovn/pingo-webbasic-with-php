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

	if (!isset($_POST['username'])) {
  	  echo "No user found.";
  	  die();
	}

	$username = $_POST['username'];
	$query1 = "SELECT * FROM user WHERE username = '" . $username."'";
	$result1 = mysql_query($query1,$conn);

	if (mysql_num_rows($result1) == 0) {
 	   echo "No user found.";
    	die();
	}
	$int = '';
        if(isset($_POST['interested'])){
  
            $interested = $_POST['interested'];
            foreach ($interested as $value) {
                if($int == '')
                {
                    $int = $int.$value;
                }else $int = $int.", ".$value;
            }
        }   
	$rows = mysql_fetch_array( $result1);
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	
	$gender =$_POST['gender'];
	$about = $_POST['about'];

	if(strcmp('', $url)==0)
	{
		$url = $rows['avatar'];
	}
	$update = "UPDATE user SET username = '" .$username."',password = '".$password ."',fullname = '".$fullname."',birthday ='".$birthday."',email ='".$email."',interested ='".$int."',avatar ='".$url."',about ='".$about."', gender ='".$gender."' WHERE username = '".$username."'";
	
	 mysql_query($update,$conn);
	
?>

<html>
<head>
<title>Edit user</title>
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
<p align = "center">Successfully user </a></p>
<p align = "center">You want <a href="list_user.php">go to list user</a></p>
<p align = "center">You want <a href="form_user.php">Register User</a></p>
</body>
</html>
<?
mysql_close($conn);
?>