<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com>
 * Date: 6/28/14
 * Time: 4:07 PM
 */
// Include all needed file
include("./include.php");

$menu = 'logout';
$errorMsg = '';
$userModel = new User();
$userModel->logout();
header("Location: ./index.php");
