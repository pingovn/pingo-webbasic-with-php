<?php
	session_start();
	include 'functions.php';
	include 'config.php';	
	
	$perPage = 5;
	$sql = "SELECT COUNT(*) as cnt FROM users";
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
	
	    //echo "$currentPage $totalPages<br/>";
	    //echo "$index\t$range <br/>"  ;
		//die();	
	$sql = "SELECT * FROM users ORDER BY id ASC LIMIT $from, $perPage";		
	$result = mysql_query($sql,$conn);
?>



<html>
	<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
	
	
	<style>
			table {
     				background-color: #888888;
     				width: 780px;
				   }
			table td {
     				background-color: #FFFFFF;
				   }
			table th {
     				background-color: #DDDDDD;
				   }
	</style>

		<title></title>
			<body>
				<form>
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
 					
 					<?php if(mysql_num_rows($result)){ ?>
 					
 					<fieldset style = "width: 800px; margin:  0px auto; background: #F5F9F0;">
        				<?php if($_SESSION['username']!=NULL){?>
						<?php echo 'Welcome ' .$_SESSION['username']. '!' ;?>
						<?php }else{ echo '';}?>
        				<p align='center'><font color=red size=25>List user</font>
           			
           			<table>
                	
                	<tr>
                    		<th width="5%" align="center">No</th>
                    		<th width="15%" >Username</th>
                    		<th width="25%">Fullname</th>
                    		<th width="42">Email</th>
                   	 		<th width="5%">Age</th>
                    		<th>Action</th>
               		 </tr>
                
                	<?php while ($info = mysql_fetch_array( $result )){	?>
                	<tr>
                				<!-- Xac dinh theo cot trong database -->
        	
                    		<td align="center"><?php echo $info['id']?></td>
                    		<td align="center"><a href="view_user.php?id=<?php echo $info['id'];?>"><?php echo $info['username'];?></a></td>
                    		<td align="center"><?php echo $info['fullname'];?></td>
                    		<td align="center"><?php echo $info['email'];?></td>
                    		<td align="center"><?php echo getAge($info['birth']);?></td>
                    		<td align="center">
                    			<a href="edit_user.php?id=<?php echo $info['id'];?>">Edit</a>&nbsp; |&nbsp;
                    			<a href="delete_user.php?id=<?php echo $info['id'];?>" onclick="javascript:return confirm('Are you sure to delete this user?');">Delete</a>
                    		</td>
                	</tr>
                		<?php } ?>
            		</table>
            			<div>

            			<?php
							if($page > 1){
								$last = $page + $perPage;
								$first = $page - $perPage;
							}	
						?>
            			

            			<?php if($currentPage != 1){?>
						<a href="?page=<?=$first?>">First</a>
          				<?php }?>


         				<?php for ($page = $index; $page <= $range; $page++) :?>
           				<?php if ($page == $currentPage): ?>                 		
                 		<?php echo $page;?>
             			<?php else: ?>
                 		<a href="?page=<?=$page?>"><?=$page?></a>
             			<?php endif ?>
         				<?php endfor ?>
						
     					</div>
        				<?php }else{ echo 'Nothing here';}?>
        			</fieldset>
        			
				</form>	
			</body>
	</head>
</html>

