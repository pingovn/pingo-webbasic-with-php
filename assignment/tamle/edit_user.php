<?php
session_start();
include 'config.php';
	
if(!isset($_GET['id'])){
	echo 'No user found';
	die();
}

$sql = "SELECT * FROM users WHERE id= ".$_GET['id'];
$result = mysql_query($sql, $conn);

if(mysql_num_rows($result)==0){
	echo 'No users found';
	die();
}
	
$info = mysql_fetch_array($result);
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
		<title>Edit user - <?php echo $info['fullname'];?></title>		
			<body>
				<form action='update_user.php' method='POST' enctype='multipart/form-data'>
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
				<table border='0' class='form' align='center'>
				<?php if($_SESSION['username']!=NULL){?>
				<?php echo 'Welcome ' .$_SESSION['username']. '!' ;?>
				<?php }else{ echo '';}?>
				<p align='center'><font color=red size=25>CREATE NEW USER</font></p>
    			<tbody>
        		<tr>
            		<td><strong>Username:</strong></td>
            		<td><?php echo $info['username'];?></td>
        		</tr>
        		<tr>
            		<td><strong>Password:</strong></td>
            		<td><input name = 'password' id ='password' size = '30' type = 'password' value = '<?php echo $info['password'];?>' ><font color=red>*</font></td>
        		</tr>
        		<tr>
            		<td><strong>Fullname:</strong></td>
            		<td><input name = 'fullname' id ='fullname' size = '30' type = 'text' value = '<?php echo $info['fullname'];?>' ></td>
        		</tr>
        		<tr>
            		<td><strong>Birthday:</strong></td>
            		<td><input name = 'birthday' id ='birthday' size = '30' type = 'text' value = '<?php echo $info['birth'];?>' ></td>
        		</tr>
        		<tr>
            		<td><strong>Email:</strong></td>
            		<td><input name = 'email' id ='email' size = '30' type = 'text' value = '<?php echo $info['email'];?>' ><font color=red>*</font></td>
        		</tr>
        		<tr>
					<td><strong>Gender:</strong></td>
					<td><select name='gender' id='gender'>
					<?php if ($info['gender'] == 'Male') : ?>
						<option value='Male' selected="selected">Male</option>
						<option value='Female'>Female</option>
						<option value='Other'>Other</option>
					<?php else: ?>
					 <?php if ($info['gender'] == 'Female') : ?>
					 	<option value='Male'>Male</option>
                        <option value='Female' selected="selected">Female</option>
                        <option value='Other'>Other</option>
                      <?php else  : ?>
					 	<option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                        <option value='Other' selected="selected">Other</option>
                     <?php endif  ?>
                     <?php endif ?>
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
            		<td><textarea rows="4" cols="30" name='about' id='about' ><?php echo $info['about'];?></textarea></td>
        		</tr>
        		<tr>
            		<td></td>
            		<td><input name='update' id='update' type='submit' value='Update'> 
            			<a href="view_user.php?id=<?php echo $info['id']?>"><input type="button" name="cancel" value="Cancel"></td>
        		</tr>
    			</tbody>
				</table>
				<input type='hidden' name='id' value="<?php echo $info['id'];?>" />
				</fieldset>
				</form>
			</body>
	</head>
</html>

