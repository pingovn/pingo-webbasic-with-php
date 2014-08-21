<?php
include("fun.php");

session_destroy();
?>
<html>
<head>
<title>Register User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
<style type="text/css">
#content{
padding: 20px;
}
</style>
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
<div id="content" align = "center">
	
	<p>Logout succes</p>
	
	
</div>
</body>

</head>
</html>