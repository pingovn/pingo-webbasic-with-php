<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com>
 * Date: 6/28/14
 * Time: 3:07 PM
 */
// Include all needed file
include("./include.php");

$menu = 'register';
$errorMsg = "";
$success = false;

if (isset($_POST["btnRegister"])) {
    // Process to register new user
    $username   = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
    $password   = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
    $confirmPassword   = isset($_POST['txtConfirmPassword']) ? $_POST['txtConfirmPassword'] : '';
    $fullname   = isset($_POST['txtFullname']) ? $_POST['txtFullname'] : '';
    $email      = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
    $aboutme    = isset($_POST['txtAboutme']) ? $_POST['txtAboutme'] : '';
    // Check required fields are inputted or not
    if ($username == '' || $password == '' || $fullname == '' || $email == '' || $aboutme == '') {
        $errorMsg = 'Please check required fields.';
    } else if ($password != $confirmPassword) {
        $errorMsg = 'Password mismatch. Please re-type the password.';
    } else {
        // Add new users to database
        $userModel = new User();
        $userId = $userModel->add($username, $password, $fullname, $email, $aboutme);
        if ($userId !== false) {
            // Registration success
            $success = true;
        } else {
            $errorMsg = "System error. Please contact administrator for more detail.";
        }
    }
}

include("./views/register.php");