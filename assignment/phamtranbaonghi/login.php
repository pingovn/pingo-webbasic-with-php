<?php
include 'title.php';
?>

<html>
    <head>
        <title>Login</title>
    <style>
        table{ font-size:21px;
               text-align: center;
               border-style: inset;
               border-color: #66CC00;
               border-width: 4px}
        td{padding-left:8px;
           padding-top:3px;
           color: #336600}
        th{font-size: 30px;
           color:rgb(61,166,30)}
        input{height: 26px}
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
                    <?php if(isset($_SESSION['error'])){ ?>
            <p style="font-size:16"><?php echo "Login fail! Please re-enter username and password.";}?></p>
                </th>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input
                        type="text"
                        name="user"
                        id="user"
                        size="36"/>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input
                        type="password"
                        name="pass"
                        id="pass"
                        size="36"/>
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
