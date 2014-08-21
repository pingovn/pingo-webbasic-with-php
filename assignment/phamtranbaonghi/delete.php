<?php
include 'connect.php';
$get=$_GET['id'];
if (NULL!=$get){
$query="DELETE FROM users WHERE id=$get";
mysqli_query($link,$query) or die(mysqli_error($link));
}
header("Location:list_users.php?page=0");
mysqli_close($link);
?>