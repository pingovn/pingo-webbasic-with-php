<?php
/**
 * Created by PhpStorm.
 * User: none
 * Date: 8/12/14
 * Time: 8:24 PM
 */

// Connect database
// Check id from $_POST
if (!isset($_POST['id'])) {

}

// Disconnect database

// Redirect to user info page
header("Location: view_user.php?id=" . $_POST['id']);
exit();
