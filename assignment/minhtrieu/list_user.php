<?php
session_start();
$_SESSION['page']='user';
include("func_include.php");

//var_dump($_POST); var_dump($_FILES); die();
$conn = connect_db();
mysql_select_db('users');

$perPage = 5;
$sql = "SELECT COUNT(*) as cnt FROM users";
$res = mysql_query($sql, $conn);
$cnt = mysql_fetch_array($res);
$totalRows = $cnt['cnt'];

$info = paging($totalRows, $conn, $perPage,$_GET);
$from = $info[0];
$index = $info[1];
$range = $info[2];
$currentPage  = $info[3];
//    $perPage = 5;
//    $sql = "SELECT COUNT(*) as cnt FROM users";
//    $res = mysql_query($sql, $conn);
//    $cnt = mysql_fetch_array($res);
//    $totalRows = $cnt['cnt'];
//    $totalPages = intval(ceil($totalRows / $perPage));
//    $interval = 2;
//
//    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
//    if ($currentPage == 0) {
//        $currentPage = 1;
//    }
//    if ($currentPage > $totalPages) {
//        $currentPage = $totalPages;
//    }
//
//    $from = ($currentPage - 1) * $perPage;
//    
//if ($currentPage <= $interval) {//display the 1st page (left -> right)
//    if ($totalPages == 1) { //don't display th pagination
//        $index = 2;
//        $range = 1;
//    } elseif ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
//        $index = 1;
//        $range = $totalPages;
//    } else { //Tong so trang lon hon so trang can index
//        $index = 1;
//        $range = 2 * $interval + 1;
//    }
//} elseif (($currentPage + $interval) >$totalPages){ //display the last page
//    if ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
//        $index = 1;
//        $range = $totalPages;
//    } else { //Tong so trang lon hon so trang can index
//        $index = $totalPages - 2 * $interval;
//        $range = $totalPages;
//    }
//} else { //display from middle
//    $index = $currentPage - $interval;
//    $range = $currentPage + $interval;
//}
////    echo "$currentPage $totalPages<br/>";
////    echo "$index\t$range <br/>"  ; 


$query = "SELECT * FROM users ORDER BY fullname ASC LIMIT $from, $perPage";

	$result = mysql_query($query,$conn);
?>
<html>
<head>
<title>List User</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
    <?php include("form_include.php"); ?>
            <!--Message from logout page OR add_user page-->
        <?php if (isset($_GET['mess'])) : ?>
         <p align="center" style="color:red; margin-bottom:7px; margin-top: 7px; font-size:20 ;"> <?php echo $_GET['mess'] ?> </p>
        <?php endif ?>
	<?php if(mysql_num_rows($result)) {?>
		<p align = "center" style="font-size: 25px;color: red;"> User list</p>
		<table class ="list" align = "center" cellspacing="0" >
		<tr>
                    <td class ="center" bgcolor="greenyellow" >No</td>
                    <td class = "left" bgcolor="greenyellow" >Username</td>
                    <td class = "left" bgcolor="greenyellow" >Fullname</td>
                    <td class = "left" bgcolor="greenyellow" >Email</td>
                    <td class = "center" bgcolor="greenyellow" >Age</td>
                    <td class = "center" width="100" bgcolor="greenyellow" >Action</td>
		</tr>
         <?php $i=0; ?>
	 <?php while ($rows = mysql_fetch_array( $result )) :?>
            <?php $i++; if ($i% 2 == 0) : ?>
                <tr bgcolor="#D2D2D2" >
                    <td class = "center" width="40"><?php echo $rows['id'];?></td>
                    <td class = "left"> <a href="#" onclick="return submitForm('view_user.php', '<?php echo $rows['id']; ?>');"><?php echo $rows['username'];?></a> </td>
                    <td class = "left"><?php echo $rows['fullname'];?></td>
                    <td class = "left"><?php echo $rows['mail'];?></td>
                    <td class = "center"><?php echo calc_age($rows['birth']);?></td>
                    <td class="center" width="100">
                        <a href="#" onclick="return submitForm('form_edit_user.php', '<?php echo $rows['id']; ?>');">Edit</a> &nbsp | &nbsp;
                        <a href="#" onclick="return submitForm('delete_user.php', '<?php echo $rows['id']; ?>');">Delete</a>
                    </td>
                </tr>
            <?php else : ?>
                <tr>
                    <td class = "center" width="40"><?php echo $rows['id'];?></td>
                    <td class = "left"> <a href="#" onclick="return submitForm('view_user.php', '<?php echo $rows['id']; ?>');"><?php echo $rows['username'];?></a> </td>
                    <td class = "left"><?php echo $rows['fullname'];?></td>
                    <td class = "left"><?php echo $rows['mail'];?></td>
                    <td class = "center"><?php echo calc_age($rows['birth']);?></td>
                    <td class="center" width="100">
                        <a href="#" onclick="return submitForm('form_edit_user.php', '<?php echo $rows['id']; ?>');">Edit</a> &nbsp | &nbsp;
                        <a href="#" onclick="return submitForm('delete_user.php', '<?php echo $rows['id']; ?>');">Delete</a>
                    </td>
                </tr>
            <?php endif; ?>
         <?php endwhile; ?>
	 </table>
        <div>

         <?php for ($page = $index; $page <= $range; $page++) :?>
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

    <form id="actionForm" action="" method="post">
        <input type="hidden" name="id" id="link_id" value="">
    </form>
</body>

</html>
<?php mysql_close($conn);?>
<script type="text/javascript">
function submitForm(action, userId) {
    // Submit form here
    var form = document.getElementById("actionForm");
    var linkId = document.getElementById("link_id");
    linkId.value = userId;
    form.action = action;
    if (action === "delete_user.php") {
        confirm('Are you sure to delete this user?');
    }
    form.submit();
    return false;

}
</script>