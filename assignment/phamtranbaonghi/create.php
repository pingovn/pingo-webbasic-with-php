<?php
include 'connect.php';
?>

<?php
if (!isset($_POST['submit']) or $_FILES['image']<0) { ?>
    
Failed to create user. <a href="create_user.php">Try again</a>.  
   <?php } else {
     $username=$_POST['username'];
     $pass=$_POST['password'];
     $fullname=$_POST['fullname'];
     $birthday=$_POST['bday'];
     $email=$_POST['email'];
     $gender=$_POST['gend'];
     $avatar="Upload/";
     $about=$_POST['about'];
     $interest=''.$_POST['intrs'][0];     
     foreach ($_POST['intrs'] as $like){
         if ($interest!=$like){
             $interest=$interest.", ".$like;
         }
     }
     if($_FILES['image']['type'] == "image/jpeg"
        || $_FILES['image']['type'] == "image/png"
        || $_FILES['image']['type'] == "image/gif"){         
         $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $type = $_FILES['image']['type']; 
                $size = $_FILES['image']['size'];                 
         $query="INSERT INTO "."users".
                 "(username,password,fullname,birthday,email,gender,interest,avatar,about) "."VALUES".
                 " ('".$username."',PASSWORD('".$pass."'),'".$fullname."','".$birthday."','"
                 .$email."','".$gender."','".$interest."','".$avatar."','".$about."')";
         mysqli_query($link,$query) or die(mysqli_error($link));
         $query2="SELECT id FROM users WHERE username='".$username."'";
         $result=mysqli_query($link, $query2);
         $row= mysqli_fetch_array($result);
         $avatar=$avatar.$row['id'];
         $query3="UPDATE users SET avatar='".$avatar."'";
         mysqli_query($link, $query3);
         move_uploaded_file($tmp_name,$avatar);
         header("Location:list_users.php");
     }else{
     echo "Wrong file avatar. "; ?> 
        <a href="create_user.php">Use another file</a>.
   <?php }} ?>
   <?php mysqli_close($link); ?> 
