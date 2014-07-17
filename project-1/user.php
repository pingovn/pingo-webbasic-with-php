<?php
/**
 * Account page
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com>
 * Date: 6/28/14
 * Time: 3:07 PM
 */
// Include all needed file
include("./include.php");
$menu = 'user';
$errorMsg = '';
$title = '';

// Get user id from $_GET (URL), if it's not exist, get from $_SESSION
$userId = false;
$loggedUserId = false;
$userModel = new User();
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
} else {
    $userId = $userModel->getId();
}

$loggedUserId = $userModel->getId();

$user = array();
if ($userId !== false) {
    $user = $userModel->getById($userId);
    if ($user === false) {
        $title = 'User not found';
        $errorMsg = 'User not found.';
    } else {
        $title = $user['fullname'];
    }
} else {
    $title = 'User not found';
    $errorMsg = 'User not found.';
}

include('./views/user.php');