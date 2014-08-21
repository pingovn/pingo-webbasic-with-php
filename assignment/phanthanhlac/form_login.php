<?php session_start();?>
<html>
    <head>
        <title>
            Welcome to my project
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
       
        <div class="content">
            <p id="hoten"> Họ và tên học viên :Phan Thạnh Lạc </p>
            <div id="navigation">
                <div class="linkbox"><a class="link" href="list_users.php">Users</a></div>
                <div class="linkbox"><a class="link" href="create_user.php">Create User</a></div>
                <?php if (!isset($_SESSION['username'])) {?>
                    <div class="linkbox"><a class="link" href="form_login.php">Login</a></div>
                <?php } else { ?>
                    <div class="linkbox"><a class="link" href="logout.php" name="logout">Logout</a></div>
                <?php } ?>
            </div>
            <div>
                <form action="login.php" method="post">
                    <table >
                        <tr>
                            <td>
                                <p class="txtLabel">Username</p>
                            </td>
                            <td>
                                <input class="txtForm" type="text" name="username" placeholder="username">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <p class="txtLabel">Password</p>
                            </td>
                            <td>
                                <input class="txtForm" type="password" name="password" placeholder="password">
                            </td>
                        </tr>

                    </table>
                    <input class="btnForm" type="submit" name="login" value="login">
                </form>
            </div>
    </div>
    </body>
</html>