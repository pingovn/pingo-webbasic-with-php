<?php
	include("fun.php");
	$conn = connect();
	//$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	//mysql_select_db("baitap6") or die("Could not select database");

    $perPage = 2;
    $sql = "SELECT COUNT(*) as cnt FROM user";
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


$query = "SELECT * FROM user ORDER BY fullname ASC LIMIT $from, $perPage";

	$result = mysql_query($query,$conn);
?>
<html>
<head>
<title>List User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
	<?php if(mysql_num_rows($result)) {?>
		<p align = "center" class="top"> List User</p>
		<table class ="list" align = "center">
		<tr>
			<td class = "right">Avatar</td>
			<td class = "left">FullName</td>
			<td class = "left">Email</td>
			<td class = "right">Age</td>
			<td class = "center">Gender</td>
			<td class = "left">Opcupation </td>
			<td class = "center" width="100">Action</td>
		</tr>
	 <?php while ($rows = mysql_fetch_array( $result )){?>
		 	<tr>
		 		<td class = "center"><img src="./<?php echo $rows['avatar']?>" width="44" height="44" ></td>
		 		<td class = "left"><?php echo $rows['fullname']?></td>
		 		<td class = "left"><?php echo $rows['email']?></td>
		 		<td class = "right"><?php echo $rows['age']?></td>
		 		<td class = "right"><?php echo $rows['gender']?></td>
		 	
		 		<td class = "left"><?php echo $rows['opcupation']?></td>
		 		<td class = "center" >
                    <a href="#" onclick="return submitForm('view_user.php', '<?php echo $rows['id']; ?>');">View</a> |
                    <a href="#" onclick="return submitForm('form_edit_user.php', '<?php echo $rows['id']; ?>');">Edit</a> |
                    <a href="#" onclick="return submitForm('delete_user.php', '<?php echo $rows['id']; ?>');">Delete</a>
                </td>
            </tr>
		 <?php }?>
	 </table>
        <div>
         <?php for ($page = $currentPage - $interval; $page <= $currentPage + $interval; $page++) :?>
             <?php if ($page == $currentPage) : ?>
                 <?=$page?>
             <?php else: ?>
                 <a href="?page=<?=$page?>"><?=$page?></a>
             <?php endif ?>
         <?php endfor ?>
     </div>
	<?php }else {?>
		<p align = "center" style ="font-family: Arial; font-size :20px ; "> NOT USER</p>
		
	<?php }?>
		<p align = "center" class="top">You want <a href="form_user.php">Register User</a></p>
    <form id="actionForm" action="" method="post">
        <input type="hidden" name="id_view" id="link_view" value="">
        <input type="hidden" name="id_edit" id="link_edit" value="">
        <input type="hidden" name="id_delete" id="link_delete" value="">
    </form>
</body>

</html>
<?php mysql_close($conn);?>
<script type="text/javascript">
function submitForm(action, userId) {
    // Submit form here
    var form = document.getElementById("actionForm");
    var linkView = document.getElementById("link_view");
    var linkEdit = document.getElementById("link_edit");
    var linkDelete = document.getElementById("link_delete");
    linkView.value = userId;
    linkEdit.value = userId;
    linkDelete.value = userId;
    form.action = action;
    if (action == "delete_user.php") {
        return confirm('Are you sure to delete this user?');
    }
    form.submit();
    return false;

}
</script>