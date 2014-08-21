<?php

function getAge($birthday){
	$tz  = new DateTimeZone('Asia/Saigon');
	$age = DateTime::createFromFormat('Y-m-d', $birthday, $tz)
	->diff(new DateTime('now', $tz))
	->y;
	echo $age;
}

function checkPass($pass, $rePass){
if($pass != $rePass){
		echo "<script language='javascript'>alert('Please check cofirm password again!');";
		echo "location.href='create_user.php';</script>";die();
}else{
	if($pass == NULL ){
		echo "<script language='javascript'>alert('Please input Password!');";
		echo "location.href='create_user.php';</script>";die();
}else{
		$password=$pass;
	}
}
if ((strlen($pass) < 3) || (strlen($pass) > 16)) {
	echo "<script language='javascript'>alert('Your password must be between 3 and 16 characters. Please type in a longer password!');";
	echo "location.href='create_user.php';</script>";die();
}
}

function checkUser($user){
if($user == NULL){
		echo "<script language='javascript'>alert('Please input Username!');";
		echo "location.href='create_user.php';</script>";die();
}else{
		$username=$user;
	}
}

function checkEmail($e){
if($e == NULL){	
		echo "<script language='javascript'>alert('Please input Email!');";
		echo "location.href='create_user.php';</script>";die();
} else{
		$email=$e;
	}
if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $e))){
		echo "<script language='javascript'>alert('Please input Email!');";
		echo "location.href='create_user.php';</script>";die();
}
}

function userExists($user){
	include 'config.php';
	$sql = "SELECT * FROM users WHERE username='$user' ";
	$result = mysql_query($sql,$conn);
	$info = mysql_fetch_array( $result);
	if($user==$info['username']){
		echo "<script language='javascript'>alert('Username already exists');";
		echo "location.href='create_user.php';</script>";
		die();
	}
}

function emailExists($e){
	include 'config.php';
	$sql = "SELECT * FROM users WHERE email='$e' ";
	$result = mysql_query($sql,$conn);
	$info = mysql_fetch_array( $result);
	if($e==$info['email']){
		echo "<script language='javascript'>alert('Email already exists');";
		echo "location.href='create_user.php';</script>";
		die();
	}
}

function checkPassupdate($pass){

if($pass == NULL ){
			echo "<script language='javascript'>alert('Please input Password!');";
			echo "location.href='create_user.php';</script>";die();
		}else{
			$password=$pass;
		}
		
	if ((strlen($passwd) < 3) || (strlen($passwd) > 16)) {
		echo "<script language='javascript'>alert('Your password must be between 3 and 16 characters. Please type in a longer password!');";
		echo "location.href='create_user.php';</script>";die();
	}
}

function  checkBirthday($birth){
	if (!preg_match("/[0-9]{4}\/[0-9]{2}\/[0-9]{2}/", $birth))
	{
		echo "<script language='javascript'>alert('BIRTHDAY - Only this birthday format - yyyy/mm/dd - is accepted.');";
		echo "location.href='create_user.php';</script>"; die();
	}
}


function delUser(){
	include 'config.php';
	
	if(!isset($_GET['id'])){
		echo 'No user found';
		die();
	}
	
	$sql = "DELETE FROM users WHERE id= ".$_GET['id'];
	mysql_query($sql);
	header("location:list_user.php");
}

function getIgmComment($username){
	include 'config.php';
	
	$sql = "SELECT * FROM users WHERE username='$username' ";
	$result = mysql_query($sql,$conn);
	$info = mysql_fetch_array( $result);
	$img=$info['avatar'];
	echo $img;
	mysql_close($conn);
}

function getIdComment($username){
	include 'config.php';

	$sql = "SELECT * FROM users WHERE username='$username' ";
	$result = mysql_query($sql,$conn);
	$info = mysql_fetch_array( $result);
	$id=$info['id'];
	echo $id;
	mysql_close($conn);
}


?>