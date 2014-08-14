<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	$query = "SELECT * FROM products";
			
	$result = mysql_query($query,$conn);
?>

<html>
    <head>
        <title>List product</title>
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
        <?php if(mysql_num_rows($result)){ ?>
        	<p align='center'><font color=red size=25>List product</font>
            <table align='center' cellspacing="1" cellpadding="3">
                <tr>
                    <th width="5%" align="center">No</th>
                    <th width="5%" >Code</th>
                    <th width="20%">Name</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Price</th>
                    <th width="10%">Image</th>
                    <th width="20%">Description</th>
                    <th width="20%">Action</th>
                </tr>
                <?php while ($rows = mysql_fetch_array( $result )){	?>
                <tr>
                	<!-- Xac dinh theo cot trong database -->
                    <td align="center"><?php echo $rows['id']?></td>
                    <td><?php echo $rows['code'];?></td>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['quantity'];?></td>
                    <td><?php echo $rows['price'];?></td>
                    <td><?php echo $rows['product_image'];?></td>
                    <td><?php echo $rows['description'];?></td>
                    <td>
                    	<a href="view_product.php?id=<?php echo $rows['id'];?>">View</a>&nbsp;|&nbsp;
                    	<a href="delete_product.php?id=<?php echo $rows['id'];?>" onclick="javascript:return confirm('Are you sure to delete this user?');">Delete</a>&nbsp;|&nbsp;
                    	<a href="edit_product.php?id=<?php echo $rows['id'];?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        <?php }else{ echo 'Nothing here';}?>
       <p align='center'><font color=red size=10>Click <a href="form_product.php">here</a> to add more product.</font>
    </body>
</html>
<?php 	mysql_close($conn);?>