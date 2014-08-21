<?php
session_start();
include("func_include.php");
$conn = connect_db();

if (!isset($_POST['id'])) {
    echo "No user found.";
    die();
}

$user_id = $_POST['id'];

$query = "SELECT username FROM users WHERE id = " . $user_id;
$result = mysql_query($query,$conn);
$rows = mysql_fetch_array($result);
//var_dump($result); var_dump($rows);die();
//
//delete in database table users
$sql = "DELETE  FROM users WHERE id = " . $user_id;
mysql_query($sql,$conn);	

//delete in database table comment
$sql = "DELETE  FROM comment WHERE user_id = " . $user_id;
mysql_query($sql,$conn);

mysql_close($conn);

header("Location:list_user.php?mess=". $rows['username'] ." has been deleted!");
?>