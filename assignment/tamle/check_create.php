<?php
include 'config.php';
include 'functions.php';

if(isset($_POST['create']))
{
	checkUser($_POST['username']);
	checkPass($_POST['password'], $_POST['re_password']);
	checkEmail($_POST['email']);
	userExists($_POST['username']);
	emailExists($_POST['email']);
	checkBirthday($_POST['birthday']);
	
	
	$username= $_POST['username'];
	$password= md5($_POST['password']);
	$email= $_POST['email'];
	$fullname= $_POST['fullname'];
	$birthday= $_POST['birthday'];
	$gender= $_POST['gender'];
	$interest = $_POST['interest'];
	$about=$_POST['about'];
	

	if(!isset($POST['id'])){
		if(
				($_FILES['img_file']['type'] != 'image/gif') &&
				($_FILES['img_file']['type'] != 'image/png') &&
				($_FILES['img_file']['type'] != 'image/jpeg')&&
				($_FILES['img_file']['type'] != 'image/jpg')){
			
				echo "<script language='javascript'>alert('Format image not valid');";
				echo "location.href='create_user.php';</script>";
		
		} else{
				
				$img=$_FILES['img_file']['name'];
				$link_img='images/'.$img;

				$sql = "INSERT INTO users (username, password, fullname, birth, email, gender, interest, avatar, about)
				VALUES ( '$username', '$password', '$fullname', '$birthday', '$email', '$gender', 
				'" . implode(', ',$_POST['interest']) . "', '$link_img', '$about')";
				
				
				$resul=mysql_query($sql,$conn);
				move_uploaded_file($_FILES['img_file']['tmp_name'],'images/'.$img);
				//var_dump($sql); die();
		}
	}
}
mysql_close($conn);
//header('location: login.php');
echo "<script language='javascript'>alert('Successfull!');";
echo "location.href='login.php';</script>";
?>