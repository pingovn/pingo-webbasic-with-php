<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");
	
	if(!isset($_GET['id'])){
		echo 'No product found';
		die();
	}
	
	$user_id=$_GET['id'];
	
	$query = "SELECT * FROM products WHERE id= ".$user_id;
	$result = mysql_query($query,$conn);
	
	if(mysql_num_rows($result)==0){
		echo 'No user found';
	}
	
	$info = mysql_fetch_array($result);
?>
<html>
    <head>
        <title>View user</title>
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
        	<p align='center'><font color=red size=25>View user</font>
            <table align='center' cellspacing="1" cellpadding="3">
                <tr>
                    <th width="5%" align="center">No</th>
                    <th width="5%">Code</th>
                    <th width="20%">Name</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Price</th>
                    <th width="30%">Image</th>
                    <th width="20%">Description</th>
                </tr>
                <tr>
                    <td><?php echo $info['id']?></td>
                    <td><?php echo $info['code'];?></td>
                    <td><?php echo $info['name'];?></td>
                    <td><?php echo $info['quantity'];?></td>
                    <td><?php echo $info['price'];?></td>
                    <td><?php echo $info['product_image'];?></td>
                    <td><?php echo $info['description'];?></td>
                </tr>
            </table>
       <p align='center'><font color=red size=10>Click <a href="list_product.php">here</a> to return list user.</font>
    </body>
</html>

<?php mysql_close($conn);?>