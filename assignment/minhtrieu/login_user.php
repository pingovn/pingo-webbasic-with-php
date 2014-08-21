<?php
session_start();
include("func_include.php");
$conn = connect_db();

//var_dump($_POST);
if (!isset($_POST['username'])) {
    echo "No user found.";
    die();
}
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username = '" . $username ."'";
//echo $query;
$result = mysql_query($query,$conn);
if (mysql_num_rows($result) == 0) {
    echo "No user in database.";
    die();
}

$rows = mysql_fetch_array($result);
//var_dump($rows); var_dump($password);die();
if ($rows['password'] != $password) {
    header("Location: login_form.php?mess= Wrong username or Password");
    exit();
} else {
    $_SESSION['login_id'] = $rows['id'];
    header ("Location:view_user.php?id=".$rows['id'] );
    exit();
}
mysql_close($conn);
?>

