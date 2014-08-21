<?php
	include("fun.php");
	$conn = connect();

	if(isset($_GET['username'])){
	$username = $_GET['username'];

	$query = "SELECT * FROM user WHERE username = '" . $username."'";
			
	$result = mysql_query($query,$conn);
		if (mysql_num_rows($result) == 0) {
   		 echo "No user found.";
    		die();
		}
	}else {
		echo "No user found.";
		die();
	}
	$rows = mysql_fetch_array($result);

	$query_comment = "SELECT * FROM comment where user ='". $username."' order by id DESC";
			
	$result_comment = mysql_query($query_comment,$conn);
//	$rows_comment = mysql_fetch_array($result_comment);
	 if (isset($_SESSION['username'])&&$_SESSION['username']!=NULL) { 
		$query12 = "SELECT * FROM user WHERE username = '" . $_SESSION['username']."'";
		$result12 = mysql_query($query12,$conn);
		$rows12 = mysql_fetch_array($result12);
	}
	
		
		
?>
<html>
<head>
<title>Information user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
<style type="text/css">

.deletecomd{
	margin-left: 55%;
	float: right;
	 
}
.buttonxoa{
	background-image: url(./data/xoa.jpg);
	border-radius: 6px;
	width: 21px;
	height: 21px;

}
.author{
	width: 55%;
	position: left;
}

</style>
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
<p align = "center" class="top">Information user</p>
<table class="table" border="1" cellspacing="1"  >
	<tr>
		<td>
			<div class = "content">
				<p>Username : <?php echo $rows['username'];?></p>
				<p>Fullname : <?php echo $rows['fullname'];?></p>
				<p>Email : <?php echo $rows['email'];?></p>
				<p>Birthday : <?php echo $rows['birthday'];?></p>
				<p>Gender : <?php echo $rows['gender'];?></p>
				<p>Interested in : <?php echo $rows['interested'];?></p>
				<p>About : <?php echo $rows['about'];?></p>
			</div>
			<div class = "image">
				<img src="./<?php echo $rows['avatar']?> "width="200" height="200">
				<p align = "center"><?php echo $rows['fullname'];?></p>
			</div>
			<div class ="comment">
				<form action="add_comment.php" method ="post">
					<div class="cmd" ><label style="color:red;">Post a comment</label></div>
					<div class="cmd">
						<label  for="yourname">Your name : </label>
						<?php if (isset($_SESSION['username'])&&$_SESSION['username']!=NULL) { 
							
							echo $rows12['fullname'];
						 }else { ?>
						Please <a href="login.php">Login</a> to your add comment"
						<?php } ?>
					</div>
					<div class="cmd">
						<label  for="yourcomment">Your comment</label>
					</div >
					<div class="cmd1">
						<textarea rows="4" cols="50" id = "yourcomment" name ="yourcomment"></textarea>
					</div>
					<div class="cmd1">
						<input type="submit" value="Add Comment"  style ="align : center"  name="submit" id="submit" />
					</div >
					<input type ="hidden" id="user_id" name="user_id" value =<?php echo $_GET['username'];?>>
				</form>
				<div class="cmd" ><label style="color:red;">Comments</label></div>
					
				<?php while ($row_comment = mysql_fetch_array( $result_comment )){?>
					<form action="delete_comment.php" method="POST" >
						<div class="viewcmd">
							<div class="author"><?php
							$query123 = "SELECT * FROM user WHERE username = '" . $row_comment['user_author']."'";
							$result123 = mysql_query($query123,$conn);
							$rows123 = mysql_fetch_array($result123);
							 echo $rows123['fullname']; ?> wrote :</div>
							<div class="deletecomd"><input type="submit" class="buttonxoa" value="" name="submit" id="submit" onclick="javascript:return confirm('Are you sure to delete this comment?');"></div>
						</div>
						<div class = "image_comment"><img src="<?php echo $rows123['avatar']; ?>" width = "80px" height ="80px"></div>
						<div class="viewcmd1"><?php echo $row_comment['comment']; ?> 
							
						</div>
							<input type ="hidden" name="id_comment" id="id_comment" value ="<?php echo $row_comment['id'];?>">
						<div class="viewcmd">-----------------------------------------------------------------</div>	
					</form>	
				<?php } ?>
					
			</div>			
		</td>
	</tr>	

</table>
<p align = "center">You want <a href="form_user.php">Register User</a> </p>
<p align = "center">You want <a href="list_user.php">go to list user</a></p>
</body>
</html>
<?
mysql_close($conn);
?>