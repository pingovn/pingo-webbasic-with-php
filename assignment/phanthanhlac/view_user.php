<?php
    session_start();
    include 'db/dbconnect.php';
    $conn = connect();

    if (!isset($_POST['id'])) {
        echo "No user found.";
        die();
    }

    $userId = $_POST['id'];
    $sql_user = "SELECT * FROM users WHERE id = " . $userId;
    $result = mysql_query($sql_user, $conn);
    if (mysql_num_rows($result) == 0) {
        echo "No user found.";
        die();
    }
 
    $rows = mysql_fetch_array($result);
    //var_dump($rows);
    $sql_comment = "SELECT * FROM comments WHERE user_id = " . $userId;
    $comment_result = mysql_query($sql_comment, $conn);
?>
<html>
    <head>
        <title><?php echo $rows['username'];?> info</title>
        <link  rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <p align="center" style="font-weight: bold"> Họ và tên học viên :Phan Thạnh Lạc </p>
            <div id="navigation" ">
                <div class="linkbox"><a class="link"  href="list_users.php">Users</a></div>
                <div class="linkbox"><a class="link" href="create_user.php">Create User</a></div>
                <?php if (!isset($_SESSION['username'])) {?>
                    <div class="linkbox"><a class="link" href="form_login.php">Login</a></div>
                <?php } else { ?>
                    <div class="linkbox"><a class="link" href="logout.php" name="logout">Logout</a></div>
                <?php } ?>
            </div>
            <p style="font-size: 30px;font-weight: bold;" align="center">User:<?php echo $rows['username'];?> </p>
            <div id="favatar">
                <img id="avatar" src="./img_user/<?php echo $rows['avatar']?>" >
            </div>
            <div id="user_info">
                <table class="txtLabel">
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $rows['username'];?></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><?php echo $rows['password'];?></td>
                    </tr>
                    <tr>
                        <td>Fullname:</td>
                        <td> <?php echo $rows['fullname'];?> </td>
                    </tr>
                    <tr>
                        <td>Birthday:</td>
                        <td>
                            <?php echo $rows['birthday'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                           <?php echo $rows['email'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <?php echo $rows['gender']?>
                        </td>
                    </tr>
                    <tr>
                        <td>Interested in:</td>
                        <td>
                            <?php echo $rows['interested_in']?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class ="comment">
                <table>
                    <tr >
                        <td >
                            <p style="font-weight: bold"> About me:</p>
                        </td>
                    </tr>
                    <tr>
                        <td  id = "about">
                            <?php echo $rows['about']?>
                        </td>
                    </tr>

                        <?php if(isset($_SESSION['username'])) {?>
                            <form action="add_comment.php" method ="post">
                                <tr>
                                    <td ><label style="color:red;">Add comment</label></td>
                                </tr>
                                <tr>
                                    <td ><textarea id = "yourcomment" name ="yourcomment" placeholder="Post your comment here in amulti-lines"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="btnComm">
                                        <input type="submit" value="Add Comment"  style ="align : center"  name="submit" id="submit" />
                                    </td> >
                                </tr>
                                    <input type ="hidden" id="user_id" name="user_id" value =<?php echo $rows['id'];?>>
                            </form>
                        <?php } else { ?>

                            <tr>
                                <td>
                                    <p> Please <a href="login.php">login</a> to add your comment</p>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php while ($rows_comment = mysql_fetch_array( $comment_result )){?>
                    <form action="#" method="POST">
                        <tr>   
                            <td class="viewcmd">
                                    <div class="author"><?php echo $rows_comment['author']; ?> wrote :</div>                              
                            </td>
                        </tr>
                        <tr>
                            
                            <td class="viewcmd1"><?php echo $rows_comment['comment']; ?> 
                            </td>       
                        </tr>
                        <tr>
                            <td class="viewcmd">-----------------------------------------------------------------</td>
                        </tr>
                            <input type ="hidden" name="id_comment" id="id_comment" value ="<?php echo $rows_comment['id']?>">
                    </form>	 
                <?php } ?>
                </table>
            </div>
        </div>				
    </body>
</html>
<?php
    mysql_close($conn);
?>










