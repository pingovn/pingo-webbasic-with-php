<?php
session_start();
include 'config.php';
include 'functions.php';

if(!isset($_GET['id'])){
	echo 'No user found';
	die();
}
	
$sql = "SELECT * FROM users WHERE id= ".$_GET['id'];
$result = mysql_query($sql,$conn);
	
if(mysql_num_rows($result)==0){
	echo 'No user found';
}
	
$info = mysql_fetch_array($result);


//echo $info['avatar']; die();
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
		<title>VIEW USER</title>
			<body>
			
		
				<form action='add_comment.php' method="POST">
				
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
 				<p align='center'><font color=red size=25>User: <?php echo $info['fullname'];?> </font></p>
				<table border='0' class='form' align='center'>
    			<tbody>
    			<tr>
    				
            		<td rowspan="6" valign="top">
            			<figure>
            				<img src="<?php echo $info['avatar'];?>" width="115" height="115" />
            				<figcaption><?php echo $info['fullname'];?></figcaption>
            			</figure>
            		</td>
        		</tr>
        		
        		<tr>
            		<td><strong>Username:</strong></td>
            		<td><?php echo $info['username']?></td>
        		</tr>
        		
        		<tr>
            		<td><strong>Full name:</strong></td>
            		<td><?php echo $info['fullname']?></td>
        		</tr>
        		
        		<tr>
            		<td><strong>Brithday:</strong></td>
            		<td><?php echo $info['birth']?></td>
        		</tr>
 
        		<tr>
					<td><strong>Gender:</strong></td>
					<td><?php echo $info['gender']?></td>
				</tr>
				
				<tr>
            		<td><strong>Interested in:</strong></td>
            		<td><?php echo $info['interest']?></td>
        		</tr>
				<tr>
            		<td><strong>About me:</strong></td>
        		</tr>
        		<tr>
        			<td><?php echo $info['about']?></td>
        		</tr>
    			</tbody>
				</table>
				<input type='hidden' name='id' value="<?php echo $info['id'];?>" />
				<?php // die();?>
				</fieldset>
				
				
				<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0 ;" id="f_login"> 
					<?php if($_SESSION['username']!=NULL){?>
					<?php echo 'Welcome ' .$_SESSION['username']. '!' ;?>
					<?php }else{ echo 'Please '; ?><a href="login.php">login</a><?php echo ' to add your comment';}?>
				</fieldset>
				
				<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0;"> 
					<table border='0' class='form' align='left' cellspacing='1' cellpadding='3'>
						<tr>
							<td>Add comment:</td>
						</tr>
						<tr><td><textarea rows="5" cols="30" name='comment' id='comment'></textarea></td></tr>
						<tr>
							<td><a><input type="submit" name="btncomment" value="Comment"></a></td>
						</tr>
					</table>	
					</fieldset>
					
					<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0;" > 
						<legend align="top"><strong>Comments</strong></legend>
						
							<?php     						
								$perPage = 5;
								$sql = "SELECT COUNT(id) as cnt FROM comments";
								$res = mysql_query($sql, $conn);
								$cnt = mysql_fetch_array($res);
								$totalRows = $cnt['cnt'];
								$totalPages = intval(ceil($totalRows / $perPage));
								$interval = 2;
	
								$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
								if ($currentPage == 0) {
									$currentPage = 1;
								}
								if ($currentPage > $totalPages) {
									$currentPage = $totalPages;
								}
	
								$from = ($currentPage - 1) * $perPage;
	
								if ($currentPage <= $interval) {//display the 1st page (left -> right)
								if ($totalPages == 1) { //don't display th pagination
										$index = 2;
										$range = 1;
								} elseif ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
										$index = 1;
										$range = $totalPages;
								} else { //Tong so trang lon hon so trang can index
										$index = 1;
										$range = 2 * $interval + 1;
								}
								} elseif (($currentPage + $interval) >$totalPages){ //display the last page
								if ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
										$index = 1;
										$range = $totalPages;
								} else { //Tong so trang lon hon so trang can index
										$index = $totalPages - 2 * $interval;
										$range = $totalPages;
								}
								} else { //display from middle
										$index = $currentPage - $interval;
										$range = $currentPage + $interval;
								}
		
								$sql_comment = "SELECT * FROM comments where user_id=".$info['id']." 
												ORDER BY id DESC LIMIT $from, $perPage";
								$result_comment  = mysql_query($sql_comment,$conn);
	
							?>	
							<?php while ($row_comment = mysql_fetch_array( $result_comment )){?>
							<input type ='hidden' name='id_comment' id='id_comment' value ="<?php echo $row_comment['id']?>">
							<form action="" method="POST">
							<div></div>
							
							<table>
							<td rowspan="3" valign="top"><img src="<?php $link_img=getIgmComment($row_comment['username']);?>" width="62" height="62" /></td>
							<td><a href="view_user.php?id=<?php $id_comment=getIdComment($row_comment['username']);?>"><?php echo $row_comment['author']; ?>:</a></td>	
							<tr>
								<td><?php echo $row_comment['comment']; ?> </td>
							</tr>
							</table>
							
							</form>	 
								<?php } ?>
						
						   <div>

         						<?php for ($page = $index; $page <= $range; $page++) :?>
           						<?php if ($page == $currentPage): ?>                 		
                 				<?php echo $page;?>
             					<?php else: ?>
                 				<a href="?page=<?=$page?>"><?=$page?></a>
             					<?php endif ?>
         						<?php endfor ?>

     					</div>
						   
					</fieldset>
					
					<fieldset style = "width: 600px; margin:  0px auto; background: #F5F9F0;">
					
					         
					</fieldset>
				</form>
			</body>
	</head>
</html>

<?php mysql_close($conn); ?>