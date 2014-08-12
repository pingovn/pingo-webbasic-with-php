<?php
	$conn=mysql_connect("localhost","root","k1llb0ts") or die("Could not connect to database");
	mysql_select_db("test") or die("Could not select database");

	$query = "SELECT * FROM users";
			
	$result = mysql_query($query,$conn);
?>

<html>
    <head>
        <title>List user</title>
    </head>
    <style type="text/css">
        table {
            background-color: #888888;
            width: 800px;
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
        	<p align='center'><font color=red size=25>List user</font>
            <table align='center' cellspacing="1" cellpadding="3">
                <tr>
                    <th width="10%" align="center">No</th>
                    <th width="30%">Fullname</th>
                    <th width="20%">Email</th>
                    <th width="10%">Age</th>
                    <th width="10%">Gender</th>
                    <th width="20%">Action</th>
                </tr>
                <?php while ($rows = mysql_fetch_array( $result )){	?>
                <tr>
                    <td align="center"><?php echo $rows['id']?></td>
                    <td><?php echo $rows['fullname'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['age'];?></td>
                    <td><?php echo $rows['gender'];?></td>
                    <td>
                        <a href="view_user.php?id=<?php echo $rows['id'];?>">View</a>&nbsp;|&nbsp;
                        <a href="delete_user.php?id=<?php echo $rows['id'];?>" onclick="javascript:return confirm('Are you sure to delete this user?');">Delete</a>&nbsp;|&nbsp;
                        <a href="edit_user.php?id=<?php echo $rows['id'];?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        <?php }else{ echo 'Nothing here';
        }
        ?>
       <p align='center'><font color=red size=10>Click <a href="return_form_user.php">here</a> to register more.</font>
    </body>
</html>
<?php
mysql_close($conn);
?>