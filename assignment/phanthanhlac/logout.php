<?php
     session_start();
    if(!isset($_GET['logout'])){
        $_SESSION = array();
    }
    header("location:form_login.php");
?>

