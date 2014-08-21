
<?php session_start();?>
<html>
	<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
		<title></title>
			<body>
				<form action='check_login.php' method="POST">
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
 							<li><a href="login.php" title="Login" id='login'>Login</a></li>
						</ul>  
 					</div>
 					
 					<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0;">
					<table border='0' class='form' align='center'>
						<tr>
							<p align="center"><font color=red size=25>USER LOGIN</font></p>
						</tr>
						<tr>
							<td><strong>Username:</strong></td>
            				<td><input name='username' id='username' size='30' type='text' placeholder = 'Input your username' value=<?=$_COOKIE['cookname']?>></td>
						</tr>
							
						<tr>
							<td><strong>Password:</strong></td>
            				<td><input name='password' id='password' size='30' type='password' placeholder = 'Input your password' value=<?=$_COOKIE['cookpass']?>></td>
						</tr>
		
						<tr>
							<td></td>
							<td colspan="2"><label><input type="checkbox" name="remember" id="remember" value=<?=$_COOKIE['remember']?>>Remember ID & PASS</label></td>
						</tr>
		
						<tr>
            				<td></td>
            				<td><input name='login' id='login' type='submit' value='Login'> or <a href="create_user.php" title="Create new user">Create new user</a></td>
        				</tr>
					</table>
					</fieldset>
				</form>	
			</body>
	</head>
</html>
<script>
document.getElementById('menu_logout').style.display = 'none';
document.getElementById('menu_login').style.display = 'block';
document.getElementById('menu_user').style.display = '';
document.getElementById('menu_create_user').style.display = '';
</script>
