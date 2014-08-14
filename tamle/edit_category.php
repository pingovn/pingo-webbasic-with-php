<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");
	
	if(!isset($_GET['id'])){
		echo 'No category found';
		die();
	}
	$cat_id=$_GET['id'];
	$query = "SELECT * FROM categories WHERE id= ".$cat_id;
	$result = mysql_query($query,$conn);
	if(mysql_num_rows($result)==0){
		echo 'No category found';
		die();
	}
	
	$info = mysql_fetch_array($result);
?>
<html>
	<head>
		<title>EDIT CATEGORIES</title>
	</head>
	<body>
		<form action="update_category" method=POST >
			<table width="350" border="3" align="left">
					<tr>
						<td>Name:</td>
						<td><input name ='name' type = 'text' size = '38' id = 'name'></td>
					</tr>
			
					<tr>
						<td><input name ='add' type = 'submit' value = 'Add Category'></td>
					</tr>
				</table>
		</form>
	</body>
</html>
<?php
mysql_close($conn);
?>
