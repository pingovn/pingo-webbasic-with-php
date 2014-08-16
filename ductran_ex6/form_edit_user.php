<?php
	include("fun.php");
	$conn = connect();

if (!isset($_POST['id_edit'])) {
    echo "No user found.";
    die();
}
	$user_id = $_POST['id_edit'];
	$query = "SELECT * FROM user WHERE id = " . $user_id;
			
	$result = mysql_query($query,$conn);
	if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}

	$rows = mysql_fetch_array($result);
?>

<html>
<head>
<title>Edit user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
<form action= "edit_user.php" method ="POST" enctype="multipart/form-data" >
	<table align = "center" width = "300" >
		<tr ><p align = "center" class="top">Eđit info user</p></tr>
		<tr>
		<td>Fullname :</td>
			<td><input type ="text" id = "fullname" name="fullname" value ="<?php echo $rows['fullname']?>"></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><input type ="text" id = "email" name="email" value ="<?php echo $rows['email']?>"></td>
		</tr>
		<tr>
			<td>Age:</td>
			<td><input type ="text" id = "age" name="age" value ="<?php echo $rows['age']?>"></td>
		</tr>
		<tr>
			<td>Gender :</td>
			<td>
				<select name='gender' id='gender'>
				<?php if($rows['gender']=='Male') {?>
					<option value='Male' selected >Male</option>
					<option value='Female'>Female</option>
				<?php } else { ?>
					<option value='Male'  >Male</option>
					<option value='Female' selected>Female</option>
				<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Avatar</td>
			<td><input type="file" name="file" id="file" value =<?php echo $rows['avatar']?>></td>
			<td><img src="<?echo $rows['avatar']?>" width="44" height="44"></td>
		</tr>	
		<tr>
			<td>Opcupation :</td>
			<td><input type ="text" id = "opcupation" name="opcupation" value = <?php $rows['opcupation']?>></td>
			
		</tr>	
		<tr>
			<td></td>
			<td> <input type="submit" value="Update" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
		</tr>	
	</table>
	<input type ="hidden" name="id" id="id" value="<?php echo $rows['id']?>">
</form>
</body>
</html>
<?php
mysql_close($conn);
?>