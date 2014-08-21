<?php
session_start();
include("func_include.php");
$conn = connect_db();

$query = "INSERT INTO comments".
        "(author_username, author, comments, user_id)".
        "VALUES".
        "('".$_POST['author_username']."' , '" .$_POST['author']."', '".$_POST['yourcomment']."', '".$_POST['user_id']."')";
//    var_dump($query); die();
mysql_query($query,$conn);
mysql_close($conn);
header("Location:view_user.php?id=".$_POST['user_id']);
?>
