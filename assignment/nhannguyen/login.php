<?php
include ("fun.php");
?>
<html>
<head>
<title>Login</title>
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
<form action= "checklogin.php" method ="POST" enctype="multipart/form-data" >
<table align = "center" width = "350" >
	<tr ><p align = "center" style="font-family:arial;color:red;font-size:30px;" >Login</p></tr>
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
		<td></td>
		<td> <input type="submit" value="Register" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
	</tr>	
</table>
</form>
</body>
</html>