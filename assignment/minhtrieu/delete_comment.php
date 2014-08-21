<?php
session_start();
include("func_include.php");
$conn = connect_db();
//var_dump($_POST); 
if (!isset($_POST['id_comment'])) {
    echo "No comment found.";
    die();
}
$comment_id = $_POST['id_comment'];
$query2 = "DELETE  FROM comments WHERE id = " . $comment_id;
//echo $query2; die();
mysql_query($query2,$conn);		
mysql_close($conn);

header("Location:view_user.php?id=". $_POST['user_id'] );
?>