<?php
	session_start();
	session_destroy();
	header("Location: form_user.php");
?>