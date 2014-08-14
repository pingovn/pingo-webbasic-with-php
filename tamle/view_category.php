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
	}
	
	$info = mysql_fetch_array($result);
?>
<html>
    <head>
        <title>View category</title>
    </head>
    <style type="text/css">
        table {
            background-color: #888888;
            width: 600px;
        }
        table td {
            background-color: #FFFFFF;
        }
        table th {
            background-color: #DDDDDD;
        }
    </style>
    <body>
        	<p align='center'><font color=red size=25>View category</font>
            <table align='center' cellspacing="1" cellpadding="3">
                <tr>
                    <th width="20%" align="center">No</th>
                    <th width="80%">Name</th>
                </tr>
                <tr>
                    <td align="center"><?php echo $info['id']?></td>
                    <td align="center"><?php echo $info['name'];?></td>
                </tr>
            </table>
       <p align='center'><font color=red size=10>Click <a href="list_category.php">here</a> to return list user.</font>
    </body>
</html>

<?php mysql_close($conn);?>