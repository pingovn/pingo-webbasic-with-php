<?php
	include("fun.php");
    $conn = connect();

if (!isset($_POST['username'])) {
    echo "No user found.";
    die();
}
	$username = $_POST['username'];
	$query = "SELECT * FROM user WHERE username = '" . $username."'";
			
	$result = mysql_query($query,$conn);
	if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}

	$rows = mysql_fetch_array($result);
	$sport = 0;
	$software = 0;
	$music = 0;
	$a = $rows['interested'];
	$b = 'Sport';
	
	if(strpos($a, $b) !== false)
	{
		$sport =1;
	}
	if(strpos($rows['interested'],"Software") !== false)
	{
		$software =1;
	}
	if(strpos( $rows['interested'],"Music") !== false)
	{
		$music =1;
	}
?>

<html>
<head>
<title>Edit user</title>
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
<form action= "edit_user.php" method ="POST" enctype="multipart/form-data" >
	<table align = "center" width = "350" >
		<tr ><p align = "center" class="top">Edit info user</p></tr>		
		<tr>
			<td>Username :</td>
			<td><input type ="text" id = "username" name="username" value ="<?php echo $rows['username'];?>" readonly></td>
		</tr>
		<tr>
			<td>Password :</td>
			<td><input type ="password" id = "password" name="password" value ="<?php echo $rows['password'];?>"></td>
		</tr>
		<tr>
			<td>Fullname :</td>
			<td><input type ="text" id = "fullname" name="fullname" value ="<?php echo $rows['fullname'];?>"></td>
		</tr>
		<tr>
			<td>Birthday :</td>
			<td><input type ="text" id = "birthday" name="birthday" value ="<?php echo $rows['birthday'];?>"></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><input type ="text" id = "email" name="email" value ="<?php echo $rows['email'];?>"></td>
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
		<td>Interested in :</td>
			<td>
				<input type ="checkbox" name="interested[]" id ="interested[]" value ="Sport" <?php if ($sport==1) {
					echo "checked";
				}?>>Sport
				<input type ="checkbox" name="interested[]" id ="interested[]" value ="Software"<?php if ($software==1) {
					# code...
					echo "checked";
				} ?>>Software
				<input type ="checkbox" name="interested[]" id ="interested[]" value ="Music" <?php if ($music ==1) {
					# code...
					echo "checked";
				} ?>>Music

			</td>	
		</tr>
	<tr>
		<td>Avatar </td>
		<td><input type="file" name="file" id="file"></td>
		<td><img src="<?echo $rows['avatar']?>" width="44" height="44"></td>
	</tr>
	
	<tr>
		<td>About :</td>
		<td><textarea rows="4"  id = "about" name ="about" value="<?php echo $rows['about'];?>"><?php echo $rows['about'];?></textarea></td>
	</tr>
		
	
	<tr>
		<td></td>
		<td> <input type="submit" value="Update" class ="button_add" style ="align = center"  name="submit" id="submit" />
			<!--<input type="cancel" value="Cancel" class ="button_add" style ="align = center"  name="cancel" id="cancel" />-->
			<input type="button" name="cancel" class ="button_add" style ="align = center" value="Cancel" onclick="window.location='list_user.php'" />
		</td>
		
	</tr>	
	</table>
	<input type ="hidden" name="id" id="id" value="<?php echo $rows['username']?>">
</form>
</body>
</html>
<?php
mysql_close($conn);
?>