<?php
session_start();
$_SESSION['page'] = "";
include("func_include.php");
$conn = connect_db();
//var_dump($_POST);var_dump($_GET);
if (isset($_POST['id'])) { //submitted from list_user.php
    $user_id = $_POST['id']; 
} elseif (isset($_GET['id'])) { //return from add_comment.php or after updated user information or after login
    $user_id = $_GET['id'];
} else {
    echo "No user found.";
    die();
}
$query = "SELECT * FROM users WHERE id = " . $user_id;
$result = mysql_query($query,$conn);
if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}

$rows = mysql_fetch_array($result);
//processing date format
$tmp = preg_split('/-/',$rows['birth']);
$year = $tmp[0];
$month = $tmp[1];
$date  = $tmp[2];

//processing interest information
if ($rows['interest'] != "" ) {
    $interest = implode(', ', unserialize($rows['interest'])); //convert array to string + add ",<space> " as separator
} else {
    $interest = "none";
}
//var_dump($rows);
//comment for commented user
$query_comment = "SELECT * FROM comments WHERE user_id =". $user_id." order by id DESC";
//echo $query_comment; die();
$result_comment = mysql_query($query_comment,$conn);
//Paging
$perPage =5;
$totalRows = mysql_num_rows($result_comment);
$info = paging($totalRows, $conn, $perPage,$_GET);
$from = $info[0];
$index = $info[1];
$range = $info[2];
$currentPage  = $info[3];

$query_comment = "SELECT * FROM comments WHERE user_id =". $user_id." order by id DESC LIMIT $from, $perPage";
$result_comment = mysql_query($query_comment,$conn);
//var_dump(mysql_fetch_array( $result_comment )); die();
//var_dump($result_comment);

if (isset($_SESSION['login_id'])) { 
    $sql = "SELECT * FROM users WHERE id =" . $_SESSION['login_id'] ;
    $result = mysql_query($sql);
    $author = mysql_fetch_array($result);
} else { //author doesn't login yet
    $author['fullname'] = "";
}


?>
<html>
<head>
<title>Information user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />

</head>
<body>
     <?php include("form_include.php"); ?>
            <!--User updated message or delete comment message-->
     <?php if (isset($_GET['mess'])) { ?>
            <p align="center"><font color="red"><?php echo $_GET['mess'];?></font></p> 
     <?php    }  ?>
    <p align = "center" class="top">User: <?php echo $rows['fullname']; ?></p>
    <table class="table_avatar"  align="center" >
        <tr>
            <td rowspan=7 class="td_avatar"><image src=<?php echo $rows['avatar']?> width="120" height="140"/> </td>
        </tr>
        <tr>
                <td class="table_fix_info">Username:</td>
                <td><?php echo $rows['username']?></td>
        </tr>
        <tr>
                <td class="table_fix_info">Fullname:</td>
                <td><?php echo $rows['fullname'];?></td>
        </tr>
        <tr>
                <td class="table_fix_info">Email:</td>
                <td><?php echo $rows['mail'];?></td>
        </tr>
        <tr>
                <td class="table_fix_info">Birthday:</td>
                <td><?php echo $date."/".$month."/".$year;?></td>
        </tr>
        <tr>
                <td class="table_fix_info">Gender:</td>
                <td><?php echo $rows['gender'];?></td>
        </tr>
        <tr>
                <td class="table_fix_info">Interested in:</td>
                <td><?php echo $interest;?></td>
        </tr>
    </table>
    <table align="center" style="width:400">
        <tr>
            <td>
            <p> About me:<br/><?php echo $rows['aboutme'];?> </p>
            </td>
        </tr>
    </table>
    <?php if (!isset($_SESSION['login_id'])) :?>
        <table>
            <tr>
            <p align="center">Please <a href="login_form.php">login</a> to add your comment </p>
            </tr>
        </table>
    <?php else :?>
     <form action="add_comment.php" method ="post">
        <table align="center" class="table_comment" >
            <tr>
                <td>Add comment by <a href="view_user.php?id=<?php echo $_SESSION['login_id'] ?>"> <?php echo $author['fullname'] ?> </a> </td>
            </tr>
            <tr>
                <td><textarea rows="4" cols="50" id = "yourcomment" name ="yourcomment"></textarea></td>
            </tr>
            <td> <input type="submit" value="Comment"  style ="align : center"  name="submit" id="submit" /> </td>
            </tr>
        </table>
         <input type ="hidden" id="user_id" name="user_id" value =<?php echo $rows['id'];?>>
         <input type ="hidden" id="author" name="author" value =<?php echo $author['fullname'];?>>
         <input type ="hidden" id="author_username" name="author_username" value =<?php echo $author['username'];?>>
     </form>
    <?php endif ?>
	<!--Display comment informaton-->
            <?php if ($result_comment != "" )	: ?>
                 <?php while ($row_comment = mysql_fetch_array( $result_comment )) : ?>
                 <?php // var_dump($row_comment); GetUserDb($conn,$row_comment['author_username'], 'id'); echo $author['fullname'] ;die();?>
    <form action="delete_comment.php" method="POST">
        <table align="center" class="table_old_comment" >
            <tr>
                <td rowspan=4 class="td_old_avatar"><image src="<?php  GetUserDb($conn,$row_comment['author_username'],'avatar');?>" width="60" height="60"/> </td>  
            </tr>
            <tr>
                <td> <a href="view_user.php?id=<?php GetUserDb($conn,$row_comment['author_username'], 'id'); ?>"> <?php echo $author['fullname'] ?> </td>  
            <tr>
                <td><p><?php echo $row_comment['comments']; ?> </p> </td>
            </tr>
            <tr>
                <td><div class="deletecomd"><input type="submit" class="delete_button" value="" name="submit" id="submit"></div></td>
            </tr>
                
        </table>
               <input type ="hidden" name="id_comment" id="id_comment" value ="<?php echo $row_comment['id']?>">
               <input type ="hidden" name="user_id" id="user_id" value ="<?php echo $rows['id']?>">
    </form>
       
                <?php endwhile ?>
         <!--Paging-->
        <div>
         <?php for ($page = $index; $page <= $range; $page++) :?>
             <?php if ($page == $currentPage) : ?>
                 <?=$page?>
             <?php else: ?>
                 <a href="?id=<?=$rows['id']?>&page=<?=$page?>"><?=$page?></a>
             <?php endif ?>
         <?php endfor ?>
        </div>
            <?php endif ?>      
</body>
</html>
<?
mysql_close($conn);
?>