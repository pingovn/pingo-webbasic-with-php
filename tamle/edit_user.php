<?php
/**
 * Created by PhpStorm.
 * User: none
 * Date: 8/12/14
 * Time: 7:39 PM
 */
$conn=mysql_connect("localhost","root","k1llb0ts") or die("Could not connect to database");
mysql_select_db("test") or die("Could not select database");

if (!isset($_GET['id'])) {
    echo "No user found.";
    die();
}

$userId = $_GET['id'];
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
        <title>Edit user info - <?php echo $rows['fullname'];?></title>
    </head>
    <body>
    <form action="update_user.php" method="post">
    <table width="250" border="3" align="center">
        <tr>
            <td>Full Name:</td>
            <td><input type=text name='fullname' id='fullname' value="<?php echo $rows['fullname'];?>"/>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type=text name='email' id='email'  value="<?php echo $rows['email'];?>"/>
            </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><input type=text name='age' id='age'  value="<?php echo $rows['age'];?>"/>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><select name='gender' id='gender'>
                    <?php if ($rows['gender'] == 'Male') : ?>
                        <option value='Male' selected="selected">Male</option>
                        <option value='Female'>Female</option>
                    <?php else : ?>
                        <option value='Male'>Male</option>
                        <option value='Female' selected="selected">Female</option>
                    <?php endif ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Update" class="input-submit" name="submit" id="submit"/>
    </table>
        <input type="hidden" name="id" value="<?php echo $rows['id'];?>" />
    </form>

    </body>
</html>
<?php
mysql_close($conn);
?>










