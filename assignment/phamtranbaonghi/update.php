<?php
include 'connect.php';
$query="SELECT * FROM users WHERE id='".$_GET['id']."'";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$row= mysqli_fetch_array($result);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
 if(isset($_POST['cancel'])){
     header("Location:user_detail.php?id=".$_GET['id']);
 } elseif(isset($_POST['update'])) {
    $username=$_POST['username'];
    $pass=test_input($_POST['password']);
    $fullname=$_POST['fullname'];
    $birthday=$_POST['bday'];
    $email=$_POST['email'];
    $gender=$_POST['gend'];
    $avatar="Upload/".$_GET['id'];
    $about=test_input($_POST['about']);
    if (isset($_POST['intrs'])){
    $interest=''.$_POST['intrs'][0];     
     foreach ($_POST['intrs'] as $like){
         if ($interest!=$like){
             $interest=$interest.", ".$like;
         }
     } 
       if($interest!=$row['interest'] && $interest!=NULL){
        $query="UPDATE users SET interest='".$interest."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }}
    if($username!=$row['username'] && $username!=NULL){
        $query="UPDATE users SET username='".$username."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    } 
    if($pass!=$row['password'] && $pass!=NULL){
        $query="UPDATE users SET password=PASSWORD('".$username."') WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }
    if($fullname!=$row['fullname'] && $fullname!=NULL){
        $query="UPDATE users SET fullname='".$fullname."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }
    if($birthday!=$row['birthday'] && $birthday!=NULL){
        $query="UPDATE users SET birthday='".$birthday."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
      }
    if($email!=$row['email'] && $email!=NULL){
        $query="UPDATE users SET email='".$email."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }
    if($gender!=$row['gender'] && $gender!=NULL){
        $query="UPDATE users SET gender='".$gender."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }
    if($_FILES['image']>0){
        if($_FILES['image']['type'] == "image/jpeg"
        || $_FILES['image']['type'] == "image/png"
        || $_FILES['image']['type'] == "image/gif"){         
         $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $type = $_FILES['image']['type']; 
                $size = $_FILES['image']['size'];                       
         move_uploaded_file($tmp_name,"Upload/".$row['id']);
         $query="UPDATE users SET avatar='".$avatar."' WHERE id='".$row['id']."'";
        mysqli_query($link, $query);
     }else{
     echo "Wrong file avatar. "; ?> 
        <a href="create_user.php">Use another file</a>.
    <?php }}
    if($about!=$row['about'] && $about!=NULL){
        $query="UPDATE users SET about='".$about."' WHERE id='".$_GET['id']."'";
        mysqli_query($link, $query);
    }
    header("Location:user_detail.php?id=".$_GET['id']);
  }else{
    echo "No user found. "; ?>
<a href="list_users.php">Go back</a>?
  <?php } ?>