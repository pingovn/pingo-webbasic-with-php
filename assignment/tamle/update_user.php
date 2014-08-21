<?php
	include 'config.php';

	if(!isset($_POST['id'])){	
		die();
	}
	if(isset($_POST['id'])){
		
		
		
		$password=$_POST['password'];
		$fullname=$_POST['fullname'];
		$birthday=$_POST['birthday'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$interset=$_POST['interest'];
		$about=$_POST['about'];
		$id=$_POST['id'];
		
		
		
if( 	($_FILES["img_file"]["type"] == "image/gif") ||
		($_FILES["img_file"]["type"] == "image/png") ||
		($_FILES["img_file"]["type"] == "image/jpeg")||
		($_FILES["img_file"]["type"] == "image/jpg") ||
		($_FILES["img_file"]["type"] == NULL)
){
		
		$img=$_FILES['img_file']['name'];
		$link_img='images/'.$img;
			
		$sql = "UPDATE users
				SET password='".md5($password)."', fullname='$fullname', birth='$birthday', 
					email='$email', gender='$gender', interest='".implode(', ', $interset)."', avatar='$link_img', 
					about='$about'
				 	WHERE id='$id' ";
	
		$result=mysql_query($sql,$conn);
		mysql_free_result($result);
		move_uploaded_file($_FILES['img_file']['tmp_name'],"images/".$img);	
		
		}
	}

	header("Location: view_user.php?id=" .$id);
	exit();
	mysql_close($conn);
?>