<?php

include("fun.php");
    $conn = connect();
    $url='';
    $suc = 0;
if(isset($_POST['fullname'])){
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
           
        }else{
           echo "Invalid";
           $suc = -1;
        }
         
        if($url!=''){
		$query = "INSERT INTO user".
				"(fullname, email, age,gender,avatar,opcupation)".
				"VALUES".
				"('".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['age']."', '".$_POST['gender']."', '".$url."', '".$_POST['opcupation']."')";

		mysql_query($query,$conn);
    }
		
	}		
	mysql_close($conn);
?>
<html>
<head>
<title>Register User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
<style type="text/css">
#content{
padding: 20px;
}
</style>
<body>
<div id="content" align = "center">
	<?php if($suc != -1){ ?><p>You have successfully registered  <?php echo $_POST['fullname']?></p> 
    <?php }else { ?>
        <p>Unsuccessfully registered </p> 
    <?php } ?>
	<p>You want<a href="form_user.php">Register User</a>  </p>
	<p>You want<a href="list_user.php">go to list user</a></p>

</div>
</body>

</head>
</html>