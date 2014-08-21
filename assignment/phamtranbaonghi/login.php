<?php
include 'title.php';
?>

<html>
    <head>
        <title>Login</title>
    <style>
        table{ text-align: center;
               border-style: inset;
               border-color: #33CC33;}
        th{font-size: 25;
           color: #336600}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>  
    <body>
        <form
            action="check.php"
            method="post"/>
        <table align="center" width="400px">
            <tr>  
                <th></th>
                <th>
                    User Login
                    <br>
                    <?php if(isset($_SESSION['error'])){ ?>
            <p style="font-size:14"><?php echo "Login fail! Please re-enter username and password.";}?></p>
                </th>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input
                        type="text"
                        name="user"
                        id="user"
                        size="28"/>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input
                        type="password"
                        name="pass"
                        id="pass"
                        size="28"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input
                        type="submit"
                        name="login"
                        value="Login"/>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>
