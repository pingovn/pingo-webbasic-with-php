<?php

    include("db/dbconnect.php");
        $conn = connect();
    $post = $_POST;
//    $post['age'] = intval($post['age']);
//    if ($post['age'] < 1 || $post['age'] > 100) {
//        header("Location: form_user.php?msg=Tuổi không phù hợp");
//        edit;
//    }
//    if ($post['gender'] != "Male" || $post['gender'] != "Female") {
//        header("Location: form_user.php?msg=Giới tính không phù hợp");
//        edit;
//    }
//    if (!preg_match('//', $post['email'])) {
//        header("Location: form_user.php?msg=Email không phù hợp");
//        edit;
//    }
    if(!isset($post['submit'])) {
       header("location:form_user.php");
    } else {
        $url='default_img.jpg';
        $suc = 0;
        if(isset($post['username'])){
            if($_FILES['file']['type'] == "image/jpeg"
                || $_FILES['file']['type'] == "image/png"
                || $_FILES['file']['type'] == "image/gif"){

                  $path = "img_user/"; 
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type']; 
                        $size = $_FILES['file']['size']; 
                        // Upload file
                        move_uploaded_file($tmp_name,$path.$name);
                        $url= $name;  

                }else{
                   $suc = -1;
                }
                $date = DateTime::createFromFormat('d/m/Y', $post['birthday']);
                $interested_str = '';
                foreach ($post['interested_in'] as $key => $value) {
                    $interested_str = $interested_str .$value .'\,';
                }
                $interested_str = substr($interested_str,0, -2);
                
                if($url!=''){
                    $sql = "INSERT INTO users".
                                    "(username,password,fullname,birthday,email,gender,interested_in,avatar,about)".
                                    "VALUES('"
                                        .$post['username']."','"
                                        .$post['password']."','"
                                        .$post['fullname']."','"
                                        .$date->format('Y-m-d')."','"
                                        .$post['email']."','"
                                        .$post['gender']."','"
                                        .$interested_str."','"
                                        .$url."','"
                                        .$post['about']."')";               
                    mysql_query($sql,$conn);
            }

        }		
        mysql_close($conn);
    }
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
	<p>You want<a href="list_users.php">go to list user</a></p>

</div>
</body>

</head>
</html>