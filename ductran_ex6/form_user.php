<html>
<head>
<title>Register User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
<form action= "add_user.php" method ="POST" enctype="multipart/form-data" >
<table align = "center" width = "300" >
	<tr ><p align = "center" style="font-family:arial;color:red;font-size:30px;" >Register User</p></tr>
	<tr>
		<td>Fullname :</td>
		<td><input type ="text" id = "fullname" name="fullname"></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><input type ="text" id = "email" name="email"></td>
	</tr>
	<tr>
		<td>Age :</td>
		<td><input type ="text" id = "age" name="age"></td>
	</tr>
	<tr>
		<td>Avatar </td>
		<td><input type="file" name="file" id="file"></td>
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
		<td>Opcupation :</td>
		<td><input type ="text" id = "opcupation" name="opcupation"></td>
	</tr>
		
	
	<tr>
		<td></td>
		<td> <input type="submit" value="Register" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
	</tr>	
</table>
</form>
</body>
</html>