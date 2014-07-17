<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com>
 * Date: 6/28/14
 * Time: 3:07 PM
 */
// Include all needed file
include("./include.php");

$menu = 'login';
$errorMsg = '';

// Check if user is logged-in or not
$userModel = new User();
if ($userModel->isLogged()) {
    header("Location: ./index.php");
    exit();
}

if (isset($_POST['btnLogin'])) {
    $username = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
    $password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
    if ($username == '' || $password == '') {
        $errorMsg = 'Please input username and password';
    } else {
        $result = $userModel->login($username, $password);
        if ($result !== true) {
            $errorMsg = $result;
        } else {
            // Login successfully
            header("Location: ./index.php");
            exit();
        }
    }
}

include('./views/login.php');