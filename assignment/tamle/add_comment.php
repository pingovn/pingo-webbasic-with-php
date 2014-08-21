<?php
	session_start();
	include 'config.php';
	if(!isset($POST['btncomment'])){
		if($_SESSION['username']!=NULL){
		$username= $_SESSION['username'];
		//Lay fullname
		$sql1 = "SELECT * FROM users WHERE username='$username' ";
		$result = mysql_query ($sql1, $conn);
		$info = mysql_fetch_array($result);
		
		$comment=$_POST['comment'];
		$user_id=$_POST['id'];
		
		//echo $info['fullname']; die();
		$sql2 = "INSERT INTO comments (username, author, comment, user_id)
				VALUES ('$username', '".$info['fullname']."', '$comment', '$user_id' )";
		mysql_query($sql2);
		//var_dump($sql2);die();
	} else{
		header("Location: view_user.php?id=" .$_SESSION['id']);
		die();
	}
}
	mysql_close($conn);
	header("Location: view_user.php?id=" .$user_id);
?>
