<?php
/**
 * Based on $_POST, check and store user info into file
 * User: Tuan Duong
 * Date: 8/8/14
 * Time: 2:09 AM
 */
$filename = 'users.txt';
if (isset($_POST['fullname'])) {
    // Collect user data and put them into array
    $userInfo = array();
    $userInfo['fullname']   = $_POST['fullname'];
    $userInfo['email']      = $_POST['email'];
    $userInfo['age']        = $_POST['age'];
    $userInfo['gender']     = $_POST['gender'];
    // Serialize array to string
    $serializedUserInfo = serialize($userInfo);
    // Write to file
    $file = fopen($filename, "a+");
    fwrite($file, $serializedUserInfo . "\n");
    fclose($file);
} else {
    header("Location: form_user.php");
    exit();
}
?>
<html>
    <head>
        <title>Register new user</title>
    </head>
    <body>
        Register new user successfully. <br />
        Click <a href="list_users.php">here</a> to view all users or click <a href="form_user.php">here</a> to register more.
    </body>
</html>