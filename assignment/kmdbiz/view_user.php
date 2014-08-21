<html>
<head>

</head>
<body>
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
</html>
    
   
<?php
	include("connection.php");
	$conn = connect();

if (!isset($_POST['id_view'])) {
    echo "No user found.";
    die();
}
	$user_id = $_POST['id_view'];
	$query = "SELECT * FROM user WHERE id = " . $user_id;
			
	$result = mysql_query($query,$conn);
	if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}

	$rows = mysql_fetch_array($result);

	$query_comment = "SELECT * FROM comment where user_id =". $user_id." order by id DESC";
			
	$result_comment = mysql_query($query_comment,$conn);
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
<p align = "center" class="top">Information user</p>
<table class="table" border="1" cellspacing="1"  >
	<tr>
		<td>
			<div class = "content">
				<p>Fullname : <?php echo $rows['fullname'];?></p>
				<p>Email : <?php echo $rows['email'];?></p>
				<p>Age : <?php echo $rows['age'];?></p>
				<p>Gender : <?php echo $rows['gender'];?></p>
				<p>Opcupation : <?php echo $rows['opcupation'];?></p>
			</div>
			<div class = "image">
				<img src="./<?php echo $rows['avatar']?> "width="200" height="200">
			</div>
			<div class ="comment">
				<form action="add_comment.php" method ="post">
					<div class="cmd" ><label style="color:red;">Post a comment</label></div>
					<div class="cmd">
						<label  for="yourname">Your name</label>
						<input  id="yourname" name="yourname" size ="50px">
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
					<input type ="hidden" id="user_id" name="user_id" value =<?php echo $_POST['id_view'];?>>
				</form>
				<div class="cmd" ><label style="color:red;">Comments</label></div>
					
				<?php while ($row_comment = mysql_fetch_array( $result_comment )){?>
					<form action="delete_comment.php" method="POST">
						<div class="viewcmd">
							<div class="author"><?php echo $row_comment['author']; ?> wrote :</div>
							<div class="deletecomd"><input type="submit" class="buttonxoa" value="" name="submit" id="submit"></div>
							
						</div>
						<div class="viewcmd1"><?php echo $row_comment['comment']; ?> 
							
						</div>

						<div class="viewcmd">-----------------------------------------------------------------</div>
						<input type ="hidden" name="id_comment" id="id_comment" value ="<?php echo $row_comment['id']?>">
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