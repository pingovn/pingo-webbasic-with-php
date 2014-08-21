<?php
    include 'db/dbconnect.php';
    $conn = connect();
    $perPage = 10;
    $sql = "SELECT COUNT(*) as cnt FROM users";
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
    $sql = "SELECT * FROM users ORDER BY username ASC LIMIT $from,$perPage";
    $result = mysql_query($sql, $conn);
    
?>
<html>
    <head>
        <title>List User</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div class="content">
            <p align="center"> Họ và tên học viên :Phan Thạnh Lạc </p>
            <div id="navigation">
                <div class="linkbox"><a class="link" href="list_users.php">Users</a></div>
                <div class="linkbox"><a class="link" href="create_user.php">Create User</a></div>
                <?php if (!isset($_SESSION['username'])) {?>
                    <div class="linkbox"><a class="link" href="form_login.php">Login</a></div>
                <?php } else { ?>
                    <div class="linkbox"><a class="link" href="logout.php" name="logout">Logout</a></div>
                <?php } ?>
            </div>
            
        </div>
            <?php if(mysql_num_rows($result)) {?>
                    <p align = "center"> List User</p>
                    <table class ="list" align = "center">
                        <tr>
                            <td class="title"> User ID</td>
                            <td class="title">Avatar </td>
                            <td class="title">Username</td>
                            <td class="title">Password</td>
                            <td class="title">Fullname</td>
                            <td class="title">Birthday</td>
                            <td class="title">Email</td>
                            <td class="title">Gender</td>
                            <td class="title">Interested in</td>
                            <td class="title">About</td>
                        </tr>
                        <?php while ($rows = mysql_fetch_array( $result )){?>
                            <tr>
                                <td ><?php echo $rows['id']?></td>
                                <td ><img src="./img_user/<?php echo $rows['avatar']?>" width="44" height="44" ></td>

                                <td >
                                    <a href="#" onclick="return submitForm('view_user.php', '<?php echo $rows['id']; ?>');">
                                        <?php echo $rows['username']?>
                                    </a>
                                </td>
                                <td ><?php echo $rows['password']?></td>
                                <td ><?php echo $rows['fullname']?></td>
                                <td><?php echo (date('Y')-date('Y',  strtotime($rows['birthday'])))?></td>
                                <td><?php echo $rows['email']?></td>
                                <td><?php echo $rows['gender']?></td>
                                <td><?php echo $rows['interested_in']?></td>
                                <td><?php echo $rows['about']?></td>
                                <td>
                                    <a href="#" onclick="return submitForm('form_edit_user.php', '<?php echo $rows['id']; ?>');">Edit</a> |
                                    <a href="#" onclick="return submitForm('delete_user.php', '<?php echo $rows['id']; ?>');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                     </table>

            <?php }else {?>
                    <p align = "center" style ="font-family: Arial; font-size :20px ; "> NOT USER</p>

            <?php }?>
                    <div id="page">
                        <?php for ($page = $currentPage - $interval; $page <= $currentPage + $interval; $page++) :?>
                            <?php if ($page == $currentPage) : ?>
                                <?=$page?>
                            <?php else : ?>
                                <?php if ( $page >= 1 && $page <=$totalPages) { ?>
                                <a href="?page=<?=$page?>"><?=$page?></a>
                                <?php } ?>
                            <?php endif ?>
                        <?php endfor ?>
                    </div>
        <form id="actionForm" action="" method="post">
            <input type="hidden" name="id" id="link_id" value="">
        </form>
    </body>

</html>
<?php mysql_close($conn);?>
<script type="text/javascript">
    function submitForm(action, userId) {
        var form = document.getElementById('actionForm');
        var link = document.getElementById('link_id');
        link.value = userId;
        form.action = action;
        if (action == "delete_user.php") {
            confirm('Are you sure to delete this user?');
        }
        form.submit();
        return false;

    }
</script>