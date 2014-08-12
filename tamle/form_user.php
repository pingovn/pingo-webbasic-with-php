<html>
	<head><title>Form User</title></head>
	<body background="http://wallpaperpanda.com/wallpapers/8i8/EjM/8i8EjMqiX.jpg"
		  style="color: white">
		<form action="create_user.php" method=POST>
	<p align="center"><font color=red size=25>REGISTER</font></p>
	<br><br>
	<table width="250" border="3" align="center">
		<tr>
			<td>Full Name:</td>
			<td><input type=text name='fullname' id='fullname'/>
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type=text name='email' id='email'/>
			</td>
		</tr>
		<tr>
			<td>Age:</td>
			<td><input type=text name='age' id='age'/>
			</td>
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
			<td><input type="submit" value="Register" class="input-submit" name="submit" id="submit"/>
	</table>
	</form>
	</body>
</html>
