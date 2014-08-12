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
        <title>User info - <?php echo $rows['fullname'];?></title>
    </head>
    <body>
        <table>
            <tr>
                <td>Fullname</td>
                <td><?php echo $rows['fullname']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $rows['email']?></td>
            </tr>
        </table>

    </body>
</html>
<?php
mysql_close($conn);
?>










