<?php
session_start();
include("func_include.php");
$conn = connect_db();

//get username who wants to logout
$user_id = $_SESSION['login_id'];
$query = "SELECT * FROM users WHERE id = " . $user_id;
$result = mysql_query($query,$conn);
if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}
$rows = mysql_fetch_array($result);

//clear session -> no user login
session_destroy();
mysql_close($conn);
//redirect to list_user
header ("Location: list_user.php?mess=". $rows['username']." has been logout!" );
exit();

?>