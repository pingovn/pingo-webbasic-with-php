<?php
include 'title.php';
include 'connect.php';
$result=mysqli_query($link,'SELECT * FROM users') or die(mysqli_error($link));
?>

<?php
function age($bday){
         $date=explode("-",$bday);
         return date("Y")-$date[0];
}
?>
<html>
    <head>
        <title>Users</title>
        <style>
       
          table{border-style:solid;
                border-width:5px;
                border-color:#003300}
          td{border-style:solid;
             border-width:2px;
             border-color:#003300
             }
        </style>    
    </head>
    <h1>User list</h1>
    <body>
        <table 
                width="1000px"
                align="center">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row= mysqli_fetch_array($result)){ ?>
                <tr>
                    <td height="35px"><?php echo $row['id']; ?></td>
                    <td><a href="user_detail.php?id=<?php echo $row['id'] ?>" ><?php echo $row['username']; ?></a></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo age($row['birthday']); ?></td>
                    <td width="14%" align="center">
                        <a href="edit_user.php?id=<?php echo $row['id'] ?>" >Edit</a> &nbsp; | &nbsp;
                        <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="javascript:return confirm('Do you really want to delete this user?')" >Delete</a>
                    </td>    
                </tr>
        <?php } ?> 
            </table>
    </body>
</html>
<?php mysqli_close($link); ?>