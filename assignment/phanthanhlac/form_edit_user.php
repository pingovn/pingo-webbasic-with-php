<?php
    include("db/dbconnect.php");
    $conn = connect();
    $post = $_POST;
    if (!isset($post['id'])) {
        echo "No user found.";
        die();
    }

    $userId = $post['id'];
    $query = "SELECT * FROM users WHERE id = " . $userId;
    $result = mysql_query($query, $conn);
    if (mysql_num_rows($result) == 0) {
        echo "No user found.";
        die();
    }

    $rows = mysql_fetch_array($result);
?>

<html>
    <head>
        <title>Edit user</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
            <form action= "update_user.php" method ="POST" enctype="multipart/form-data" >

                <table>
                        <tr>
                            <td class="txtLabel">
                                Username
                            </td>
                            <td>
                                <input class="txtForm" type="text" name="username" placeholder="Username" value="<?php echo $rows['username'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Password
                            </td>
                            <td>
                                <input class="txtForm" type="password" name="password" placeholder="Password" value="<?php echo $rows['password'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Fullname
                            </td>
                            <td>
                                <input class="txtForm" type="text" name="fullname" placeholder="Fullname" value="<?php echo $rows['fullname'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Birthday
                            </td>
                            <td>
                                <input type="text" class="txtForm" name ="birthday" placeholder="dd/mm/yyyy" value="<?php echo $rows['birthday'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Email
                            </td>
                            <td>
                                <input class="txtForm"  type="text" name ="email" placeholder="john.as@example.com" value="<?php echo $rows['email'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Gender
                            </td>
                            <td>
                                <select name='gender' id='gender'>
                                    <?php if($rows['gender']=='Male') {?>
                                            <option value='Male' selected >Male</option>
                                            <option value='Female'>Female</option>
                                            <option value='Other'>Other</option>
                                    <?php } elseif ($rows['gender']=='Female') { ?>
                                            <option value='Male'  >Male</option>
                                            <option value='Female' selected>Female</option>
                                            <option value='Other'>Other</option>

                                    <?php } else {?>
                                            <option value='Male'  >Male</option>
                                            <option value='Female' >Female</option>
                                            <option value='Other' selected>Other</option>
                                    <?php } ?>     
                                    </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                Interested in
                            </td>
                            <td>
                                <?php $int_arr = explode(",",$rows['interested_in']);
                                        if (in_array('Sport', $int_arr)) { ?>
                                                <input type="checkbox" name="interested_in[]" value="Sport" checked="checked">Sport
                                        <?php } else { ?>
                                                <input type="checkbox" name="interested_in[]" value="Sport">Sport                                         
                                        <?php } if (in_array('Software', $int_arr)) { ?>
                                                <input type="checkbox" name="interested_in[]" value="Software" checked="checked">Software
                                        <?php } else { ?>
                                                <input type="checkbox" name="interested_in[]" value="Software">Software
                                        <?php } if (in_array('Music', $int_arr)) { ?>
                                                <input type="checkbox" name="interested_in[]" value="Music" checked="checked">Music
                                        <?php } else { ?>
                                                <input type="checkbox" name="interested_in[]" value="Music">Music                                          
                                        <?php } ?>
                            </td>
                        </tr>
                         <tr>
                            <td class="txtLabel">
                                Avatar
                            </td>
                            <td>
                                <input type="file" name="file" id="file" >
                            </td>
                        </tr>
                        <tr>
                            <td class="txtLabel">
                                About:
                            </td>
                            <td>
                                <textarea  name="about" TextMode = "Multiline" placeholder="Something about this user in multi-line" text="<?php echo $rows['about']?>"> 
                                </textarea>
                            </td>
                        </tr>
                        
                    </table>
                    <input id="update"class="btnForm"type="submit" name ="submit" value="Update" >
                    <input type ="hidden" name="id" id="id" value="<?php echo $rows['id']?>">
                    
            </form>
        </div>
    </body>
</html>
<?php
    mysql_close($conn);
?>
<script type="text/javascript">
    function postTextarea(text)
        document.getElementById("about").value = text;
</script>