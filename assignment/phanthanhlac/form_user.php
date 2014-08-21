<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
            <p align="center">Create new User</p>
            <form action="create_user.php" method="post" enctype="multipart/form-data"> 
                <table>
                    <tr>
                        <td class="txtLabel">Username </td>
                        <td>
                            <input class="txtForm" type="text" name="username" placeholder="Username">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Password
                        <td>
                            <input class="txtForm" type="password" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Fullname</td>
                        <td>
                            <input class="txtForm" type="text" name="fullname" placeholder="Fullname">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Birthday</td>
                        <td>
                            <input class="txtForm" type="text" name ="birthday" placeholder="dd/mm/yyyy">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Email</td>
                        <td>
                            <input class="txtForm" type="text" name ="email" placeholder="john.as@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Gender</td>
                        <td>
                            <select name='gender' id='gender'>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                                <option value='Female'>Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">Interested in</td>
                        <td>
                            <input type="checkbox" name="interested_in[]" value="Sport">Sport
                            <input type="checkbox" name="interested_in[]" value="Software">Software
                            <input type="checkbox" name="interested_in[]" value="Music">Music
                        </td>
                    </tr>
                     <tr>
                        <td class="txtLabel">Avatar</td>
                        <td>
                            <input type="file" name="file" id="file">
                        </td>
                    </tr>
                    <tr>
                        <td class="txtLabel">About</td>
                        <td>
                            <textarea  name="about" placeholder="Something about this user in multi-line">
                            </textarea>
                        </td>
                    </tr>
                    
                   
                </table>
                <input class="btnForm"type="submit" name ="submit" value="Create">
            </form>
        </div>
    </body>
</html>
