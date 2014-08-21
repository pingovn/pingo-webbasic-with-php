<?php
session_start();
include 'config.php';


if(isset($_POST['username'])){
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=md5($_POST['password']);
	
	
	$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."' ";
	
	if(!($result = mysql_query($sql))) 
			die(mysql_error());
	$Rows = mysql_num_rows($result);
	if($Rows != 0) {
		$info = mysql_fetch_array($result);
		$id= $info['id'];
		echo "<script>";
		echo "alert('Login sussecfull!');";
		echo "</script>";
    	header("Location: view_user.php?id=" .$id);			
	} 	
		else {
		echo "<script language='javascript'>alert('Username or Password was wrong - Please login again');";
    	echo "location.href='login.php';</script>";
}
if (isset($_POST['remember'])) {
	setcookie("cookname", $_POST['username'], time()+60*60*24*100, "/");
	setcookie("cookpass", $_POST['password'], time()+60*60*24*100, "/");
}
}
?>