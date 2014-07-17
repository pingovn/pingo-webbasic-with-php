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

$userModel = new User();
if (!$userModel->isLogged()) {
    $errorMsg = "Please login to continue";
} else {
    $userId = $userModel->getId();
    $user = $userModel->getById($userId);
}

include('./views/editaccount.php');