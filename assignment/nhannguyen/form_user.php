<?php 
include("fun.php");
?>
<html>
<head>
<title>Register User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />

<link rel="stylesheet" type="text/css" media="all" href="js/jsDatePick_ltr.min.css" />

<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type="text/javascript" src="js/jsDatePick.jquery.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"birthday",
			dateFormat:"%d-%M-%Y"
			
		});
	};
</script>
<style type="text/css">

</style>
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
	<div>
		<form action= "add_user.php" method ="POST" enctype="multipart/form-data" >
			<table align = "center" width = "350" >
				<tr ><p align = "center" style="font-family:arial;color:red;font-size:30px;" >Register User</p></tr>
				<tr ><p align = "center" style="font-family:arial;color:red;font-size:12px;" ><?php if(isset($_GET['msg'])) {echo $_GET['msg'];} ?></p></tr>
				<tr>
					<td>Username :</td>
					<td><input type ="text" id = "username" name="username"></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type ="password" id = "password" name="password"></td>
				</tr>
				<tr>
					<td>Fullname :</td>
					<td><input type ="text" id = "fullname" name="fullname"></td>
				</tr>
				<tr>
					<td>Birthday :</td>
					<td><input type ="text" id = "birthday" name="birthday"></td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><input type ="text" id = "email" name="email"></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td><select name='gender' id='gender'>
						<option value='Male'>Male</option>
						<option value='Female'>Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Interested in :</td>
					<td>
						<input type ="checkbox" name="interested[]" id ="interested[]" value ="Sport">Sport
						<input type ="checkbox" name="interested[]" id ="interested[]" value ="Software">Software
						<input type ="checkbox" name="interested[]" id ="interested[]" value ="Music">Music

					</td>	
				</tr>
				<tr>
					<td>Avatar </td>
					<td><input type="file" name="file" id="file"></td>
				</tr>
	
				<tr>
					<td>About :</td>
					<td><textarea rows="4"  id = "about" name ="about"></textarea></td>
				</tr>
		
	
				<tr>
					<td></td>
					<td> <input type="submit" value="Create" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
				</tr>	
			</table>
		</form>
	</div>
</body>
</html>