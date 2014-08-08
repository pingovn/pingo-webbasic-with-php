<?php
// Get data from file
$filename = "users.txt";
$file = fopen($filename, "r");
$users = array();
while (!feof($file)) {
    // Read the file line by line and unserialize the string back to array
    $tmp = fgets($file);
    $user = unserialize($tmp);
    if ($user !== false) {
        $users[] = $user;
    }
}
fclose($file);
?>
<html>
    <head>
        <title>Users</title>
    </head>
    <style type="text/css">
        table {
            background-color: #888888;
            width: 600px;
        }
        table td {
            background-color: #FFFFFF;
        }
        table th {
            background-color: #DDDDDD;
        }
    </style>
    <body>
        <?php if (count($users) > 0) : ?>
            List of registered users: <br />
            <table cellspacing="1" cellpadding="3">
                <tr>
                    <th width="10%" align="center">No</th>
                    <th width="30%">Fullname</th>
                    <th width="30%">Email</th>
                    <th width="10%">Age</th>
                    <th width="20%">Gender</th>
                </tr>
                <?php foreach ($users as $index => $user) :?>
                <tr>
                    <td align="center"><?php echo $index;?></td>
                    <td><?php echo $user['fullname'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['age'];?></td>
                    <td><?php echo $user['gender'];?></td>
                </tr>
                <?php endforeach ?>
            </table>
        <?php else : ?>
            Nothing here
        <?php endif ?>
    </body>
</html>