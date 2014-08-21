<?php
	include("fun.php");
	$conn = connect();
	$query = "SELECT * FROM user";
	$i=1;
	$result = mysql_query($query,$conn);
	if(isset($_SESSION['username'])){
//var_dump($_SESSION['username']);
	}
?>
<html>
<head>
<title>List User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
	<div align = "center" style="font-size :45px;">
		<?php echo  $text_pingo ?>
	</div>
	<div align = "center" style="font-size :25px;">
		<?php echo  $text_info ?>
	</div>
	<div class ="menuform">
		<ul class="topnav">
			<li>
				<a href="list_user.php">List User</a>
			</li>	
			<li>
				<a href="form_user.php">Create User</a>
			</li>	
			<?php 
			if (isset($_SESSION['username'])) {?>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			<?php }else {?>
				<li>
					<a href="login.php">Login</a>
				</li>
			<?php } ?>
			
		</ul>	
	</div>
	<?php if(mysql_num_rows($result)) {?>
		<p align = "center" class="top"> List User</p>
		<table class ="list" align = "center">
		<tr>
			<td class = "center">No</td>
			<td class = "left">Username</td>
			<td class = "left">Fullname</td>
			<td class = "left">Email</td>
			<td class = "right">Birthday </td>
			<td class = "center">Action</td> 
		</tr>
	 <?php while ($rows = mysql_fetch_array( $result )){?>
		 	<tr>
		 		<td class = "center"><?php echo $i; $i++; ?></td>
		 		<td class = "left"><a href="view_user.php?username=<?php echo $rows['username'];?>"><?php echo $rows['username'];?></a></td>
		 		<td class = "left"><?php echo $rows['fullname']?></td>
		 		<td class = "left"><?php echo $rows['email']?></td>
		 		<td class = "right"><?php echo $rows['birthday']?></td>
		 	
		 		
		 		<td class = "center">
           	     <form action = "form_edit_user.php" method = "POST">
                   		<input type = "hidden" value= "<?php echo $rows['username']; ?>" name="username" id ="username">                  		 
                   		<input type="submit" value="Edit"  name="submit" id="submit" />
                   </form>
                   <form action = "delete_user.php" method = "POST">
                   		<input type = "hidden" value= "<?php echo $rows['username']; ?>" name="username" id ="username">           		 
                   		<input type="submit" value="Delete"  name="submit" id="submit" onclick="javascript:return confirm('Are you sure to delete this user?');"/>
                   </form>
                </td>
			 </tr>
		 <?php }?>
	 </table>
	<?php }else {?>
		<p align = "center" style ="font-family: Arial; font-size :20px ; "> NOT USER</p>
		
	<?php }?>
		<p align = "center" class="top">You want <a href="form_user.php">Register User</a></p>
</body>

</html>
<?php mysql_close($conn);?>