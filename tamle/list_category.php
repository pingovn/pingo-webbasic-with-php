<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	$query = "SELECT * FROM categories";
			
	$result = mysql_query($query,$conn);
?>

<html>
    <head>
        <title>List category</title>
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
        	<p align='center'><font color=red size=25>List category</font>
            <table align='center' cellspacing="1" cellpadding="3">
                <tr>
                    <th width="20%" align="center">No</th>
                    <th width="80%" align="center">Name</th>
                </tr>
                <?php while ($rows = mysql_fetch_array( $result )){	?>
                <tr>
                    <td align="center"><?php echo $rows['id']?></td>
                    <td align="center"><?php echo $rows['name'];?></td>
                    <td>
                    	<a href="view_category.php?id=<?php echo $rows['id'];?>">View</a>&nbsp;|&nbsp;
                    	<a href="delete_category.php?id=<?php echo $rows['id'];?>" onclick="javascript:return confirm('Are you sure to delete this category?');">Delete</a>&nbsp;|&nbsp;
                    	<a href="edit_category.php?id=<?php echo $rows['id'];?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        <?php }else{ echo 'Nothing here';}?>
       <p align='center'><font color=red size=10>Click <a href="form_category.php">here</a> to add more.</font>
    </body>
</html>
<?php 	mysql_close($conn);?>