<?php
session_start();
//var_dump($_POST); die();
include("func_include.php");
$conn = connect_db();

if (!isset($_POST['id'])) {
  echo "No user found.";
  die();
}

if (isset($_POST['cancel'])) { //cancel case
    header ("Location: view_user.php?id=".$_POST['id'] );
    exit();
} 

//Update case
$user_id = $_POST['id'];
$query1 = "SELECT * FROM users WHERE id = " . $user_id;
$result1 = mysql_query($query1,$conn);

if (mysql_num_rows($result1) == 0) {
   echo "No user found.";
   die();
}
$rows = mysql_fetch_array( $result1);

if ($_FILES['image']['error']>0) {
   echo "File upload error. Avatar can't be updated! <br/>";
    //use avatar from database
   $url = $rows['avatar'];
} else {
    $path = "data/"; 
    $url= "upload/".$_FILES['image']['name'];
    // Upload file
    move_uploaded_file($_FILES['image']['tmp_name'],$url);
}
$post =$_POST;
user_validation($post,$conn, "edit");

$interest = isset($post['interest']) ?  serialize($post['interest']) : "";
$update = "UPDATE users SET " .
//             " username = '" .$post['username']. "' , " .
             " password = '" .md5($post['password']). "' , " .
             " fullname = '" .$post['fullname']. "'  , " .
             " birth    = '" .$post['birthday']. "' , " .
             " mail     = '" .$post['email']. "' , " .
             " gender   = '" .$post['gender']. "' , " .
             " interest = '" .$interest. "' , " .
             " avatar   = '" .$url. "' , " .
             " aboutme  = '" .$post['introduction']. "'" .
             " WHERE id = ".$user_id;
//echo $update; die();
 mysql_query($update,$conn);
	
mysql_close($conn);
header("Location: view_user.php?id=".$post['id'] ."&mess=User ". $post['username'] . " updated successfully!" );
exit();
?>