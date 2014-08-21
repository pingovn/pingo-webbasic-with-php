<?php
include 'title.php';
include 'connect.php';
?>

<?php
$currentPage=$_GET['page'];
$perPage=4;
$totalRows=  mysqli_num_rows(mysqli_query($link,"SELECT * FROM users")) or die(mysqli_error($link));
$totalPages= intval(ceil($totalRows / $perPage));
$start=$currentPage*$perPage;
$query="SELECT * FROM users ORDER BY id ASC LIMIT $start,$perPage";
$result=  mysqli_query($link, $query);
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
          h1{color:#003300}
          table{font-size:20px;
                border-style:solid;
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
        <?php
        for($page=0; $page<$totalPages; $page++){
            echo "<a href='list_users.php?page=$page'>$page</a>"; ?>
        &nbsp;
        <?php } ?>
    </body>
</html>
<?php mysqli_close($link); ?>