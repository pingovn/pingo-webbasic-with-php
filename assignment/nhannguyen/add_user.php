<?php
include("fun.php");
    $conn = connect();
    $url='';
    $suc = 0;

    $string = $_POST['email'];
    $pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
    if(preg_match($pattern, $string, $match) == 1){
        
    }
    else{
        header("Location: form_user.php?msg=mail khong hop le");
            edit;
    }
    $interested =1;
   
if(isset($_POST['username'])){
    $test = testuser($_POST['username']);
    if($test == true){
        header("Location: form_user.php?msg=Username đã tồn tài");
        edit;
        $suc = -1;
    }
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
            header("Location: form_user.php?msg=File ảnh không đúng định dạng");
            edit;
            $suc = -1;
        }
        $int = '';
        if(isset($_POST['interested'])){
          // var_dump($_POST['interested']);
            $interested = $_POST['interested'];
            foreach ($interested as $value) {
                if($int == '')
                {
                    $int = $int.$value;
                }else $int = $int.", ".$value;
            }
        }   
         $query = "INSERT INTO user".
                "(username, password, fullname,birthday,email,gender,interested,avatar,about)".
                "VALUES".
                "('".$_POST['username']."', '".$_POST['password']."', '".$_POST['fullname']."', '".$_POST['birthday']."', '".$_POST['email']."', '".$_POST['gender']."', '".$int."', '".$url."', '".$_POST['about']."')";
                    mysql_query($query,$conn);
       
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