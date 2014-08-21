<?php session_start();?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
		<title>CREATE USER</title>		
			<body>
				<form action='check_create.php' method='POST' enctype='multipart/form-data'>
				<table class="logo_table" align="center"  >
            			<tr>
                		<td><img src="images/Avengers-Captain-America-icon.jpg" width="40" height="32"></td>
                			<td><p align = "center" style="font-family:arial;color:red;font-size:30px;" >
                			<strong>Pingo - PHP Basic - Final Assignment</strong></p></td>
            			</tr>
            			<tr>
                			<td colspan="2"><p align="center" style="font-size:20px;"> Họ và tên học viên: Lê Trung Ngọc Tâm</p></td>
            			</tr>
        			</table>
				<div id="menu">  
						<ul>        
							<li><a href="create_user.php" title="Create User">Create User</a></li>   
 							<li><a href="login.php" title="Login" id="login">Login</a></li>
  
 							<?php if ($_SESSION['username']!=NULL) { ?>
 							<li><a href="list_user.php" title="User">User</a></li>
 							<li><a href="logout.php" title="Logout" id="login" onclick="javascript:return confirm('Are you sure to logout this user?');">Logout</a></li>
 							<script>
 							document.getElementById("login").style.display = "none";
 							</script>  
 							<?php } else { ?>  
							<script>
							document.getElementById("logout").style.display = "none";
							</script>  
							<?php } ?>
						</ul>  
 					</div>
 				<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0;">
 				<?php if($_SESSION['username']!=NULL){?>
				<?php echo 'Welcome ' .$_SESSION['username']. '!' ;?>
				<?php }else{ echo '';}?>
				<table border='0' class='form' align='center'>
				<p align='center'><font color=red size=25>CREATE NEW USER</font></p>
    			<tbody>
        		<tr>
            		<td><strong>Username:</strong></td>
            		<td><input name = 'username' id = 'username' size = '30' type = 'text' placeholder = 'Username' ><font color=red>*</font></td>
        		</tr>
        		<tr>
            		<td><strong>Password:</strong></td>
            		<td><input name = 'password' id ='password' size = '30' type = 'password' placeholder = 'Password'><font color=red>*</font></td>
        		</tr>
        		<tr>
            		<td><strong>Re-Password:</strong></td>
            		<td><input name = 're_password' id ='re_password' size = '30' type = 'password' placeholder = 'Re-Password'><font color=red>*</font></td>
        		</tr>
        		<tr>
            		<td><strong>Fullname:</strong></td>
            		<td><input name = 'fullname' id ='fullname' size = '30' type = 'text' placeholder = 'Fullname'></td>
        		</tr>
        		<tr>
            		<td><strong>Birthday:</strong></td>
            		<td><input name = 'birthday' id ='birthday' size = '30' type = 'text' placeholder = 'yyyy/mm/dd'></td>
        		</tr>
        		<tr>
            		<td><strong>Email:</strong></td>
            		<td><input name = 'email' id ='email' size = '30' type = 'text' placeholder = 'john.as@example.com'><font color=red>*</font></td>
        		</tr>
        		<tr>
					<td><strong>Gender:</strong></td>
					<td><select name='gender' id='gender'>
					<option value='Male'>Male</option>
					<option value='Female'>Female</option>
					<option value='Other'>Other</option>
					</select>
					</td>
				</tr>
				<tr>
            		<td><strong>Interested in:</strong></td>
            		<td>
            		<input name = "interest[]" type = "checkbox" value = "Sport" />Sprot
					<input name = "interest[]" type = "checkbox" value = "Software" />Sofware
					<input name = "interest[]" type = "checkbox" value = "Music" />Music 
					<input name = "interest[]" type = "checkbox" value = "Other" />Other
					</td>
        		</tr>
				<tr>
            		<td><strong>Avatar:</strong></td>
            		<input type='hidden' name='MAX_FILE_SIZE' value='5000000'>
            		<td><input name='img_file' id='img_file' size='30' type='file'></td>
        		</tr>
        		<tr>
            		<td><strong>About:</strong></td>
            		<td><textarea rows="4" cols="30" name='about' id='about' placeholder = 'Something about this user in multi-line.'></textarea></td>
        		</tr>
        		<tr>
            		<td></td>
            		<td><input name='create' id='create' type='submit' value='Create'> <input name='submit' type='reset' value='Reset'></td>
        		</tr>
        		<tr>
        			<td></td>
        			<td><font color=red>(*) This information is required</font></td>
        		</tr>
    			</tbody>
				</table>
				</fieldset>
				</form>
			</body>
	</head>
</html>


