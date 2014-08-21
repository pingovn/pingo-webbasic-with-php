
    <table border="1" align = "center" width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0"   >
      
        <form action = list_user.php> 
        <td> <input type="submit" value="User" class ="button_add" style ="align = center"  /></td>
        </form>
<form action = Form_user.php> 
        <td> <input type="submit" value="Create User" class ="button_add" style ="align = center"   /></td>
        </form>
<form action = Login.php> 
        <td> <input type="submit" value="Login" class ="button_add" style ="align = center"   /></td>
        </form>
<form action = Logout.php> 
        <td> <input type="submit" value="Logout" class ="button_add" style ="align = center"   /></td>
        </form>

      <tr ><p align = "center" style="font-family:arial;color:green;font-size:20px;" >Ten hoc vien : Kieu Minh Duy</p></tr>      
       	
    </table>

<form action= "code_exec.php" method ="POST" enctype="multipart/form-data" >
<table border="1" align = "center" width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0"   >
	<tr ><p align = "center" style="font-family:arial;color:green;font-size:30px;" >Create new User</p></tr>

        <tr> 
		<td>Username </td>
		<td><input type ="text" id = "Username" name="fullname"></td>
	</tr>
        <tr>
                <td>Password </td> 
                <td><input type ="password" id ="Password" name ="Password"></td>
        </tr>
        <tr>
		<td>Fullname </td>
		<td><input type ="text" id = "Fullname" name="fullname"></td>
	</tr>
        <tr>
		<td>Birthday </td>
                <td><input type ="birthday" id = "Birthday" name="Birthday"></td>
	</tr>
	<tr>
		<td>Email </td>
		<td><input type ="text" id = "email" name="email"></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td><select name='gender' id='gender'>
			<option value='Male'>Male</option>
			<option value='Female'>Female</option>
                        <option value='Other'>Other</option>
				</select>
		</td>
	</tr>
	
	<tr>
                <td> Intersted in </td> 
                <td>    <input type="checkbox" name="Sport[]" id="r"  checked="checked" value=Ssport" />  <label for="s">Sport</label>
                        <input type="checkbox" name="Soflware[]" id="r"  checked="checked" value="Soflware" />  <label for="r">Soflware</label>
                        <input type="checkbox" name="Music[]" id="r"  checked="checked" value="Music" />  <label for="r">Music</label>
                </td>
        </tr>
        <tr>
		<td>Avatar </td>
		<td><input type="file" name="file" id="file"></td>
	</tr>
	<tr>
		<td>About</td>
		<td><textarea name="about" id="desc" rows="3" cols="35" > Something about this user in multi-line </textarea>
                </td>
	</tr>
		
        
	<tr>
		<td></td>
                <td> <input type="submit" value="Create" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
	</tr>	
</center>>
</table>
</form>
</body>
</html>