<?php
session_start();
$_SESSION['page'] = 'log';
?>


<html>
    <head>
        <title> User Registration</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
    </head>
    <body>
        <form action ="login_user.php" method="post" enctype="multipart/form-data">
            <?php include("form_include.php"); ?>
            <table    cellpadding="2px" align="center">
                <tr>
                    <td></td>
                    <td><p style="font-size:25;color:blue;">User Login</p></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php if (isset($_GET['mess'])) : ?>
                            <p style="color:red;"><?php echo $_GET['mess']; ?></p>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type=text name='username' id='username'/>  </td>
                </tr>
                 <tr>
                    <td>Password</td>
                    <td><input type=password name='password' id='password'/>  </td>
                </tr>
                
                <tr>
                    <td> </td>
                    <td><input type="submit" value="Login" name="submit" id="submit"/>
                </tr>
            </table>
        </form>
    </body>
</html>
