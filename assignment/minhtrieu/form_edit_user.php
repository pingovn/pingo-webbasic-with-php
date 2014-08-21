<?php
session_start();
$_SESSION['page']= "";
include("func_include.php");
$conn = connect_db();

if (!isset($_POST['id'])) {
    echo "No user found.";
    die();
}
$user_id = $_POST['id'];
$query = "SELECT * FROM users WHERE id = " . $user_id;

$result = mysql_query($query,$conn);
if (mysql_num_rows($result) == 0) {
    echo "No user found.";
    die();
}

$rows = mysql_fetch_array($result);
//
//check checkbox
//
$sport = 0;
$software =0;
$music = 0;
//var_dump($rows);
//var_dump(unserialize($rows['interest']));
//die();
if ($rows['interest'] != "" ) {
    foreach (unserialize($rows['interest']) as $interest) {
        if ($interest == 'Sport')       {$sport = 1; continue; }
        if ($interest == 'Software')    {$software = 1; continue;}
        if ($interest == 'Music')       {$music = 1; }
    }
} else {
    $sport = 0;
    $software =0;
    $music = 0;
}
//
//check date
//
$tmp= preg_split('/-/', $rows['birth']);
$date_form = $tmp[2] . "/" . $tmp[1] . "/" . "$tmp[0]";
//var_dump($rows['birth']); var_dump($tmp);
//var_dump($date_form); die();

?>

<html>
<head>
<title>Edit user</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
</head>
<body>
     <?php include("form_include.php"); ?>
<form action= "edit_user.php" method ="POST" enctype="multipart/form-data" >
	<table align = "center"  >
            <tr ><p align = "center" class="top">Update user information </p></tr>
            <tr>
                <td>Username: </td>
                <!--<td><input type ="text" id = "username" name="username" value ="<?php echo $rows['username'];?>"></td>-->
                <td><?php echo $rows['username'];?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type=password name='password' id='password' value ="<?php echo $rows['password'];?>"/>  </td>
            </tr>
            <tr>
                <td>Fullname </td>
                <td><input type ="text" id = "fullname" name="fullname" value ="<?php echo $rows['fullname'];?>"></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><input type=date name='birthday' id='birthday' value ="<?php echo $date_form;?>" /> </td> 
            </tr>
            <tr>
                <td>Email: </td>
                <!--<td><input type ="text" id = "email" name="email" value ="<?php echo $rows['mail'];?>"></td>-->
                <td><?php echo $rows['mail'];?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name='gender' id='gender'>
                    <?php if($rows['gender']=='Male') {?>
                            <option value='Male' selected >Male</option>
                            <option value='Female'>Female</option>
                    <?php } else { ?>
                            <option value='Male'  >Male</option>
                            <option value='Female' selected>Female</option>
                    <?php }?>
                    </select>
                </td>
            </tr>
             <tr>
                <td>Interest in</td>
                <td> <input type="checkbox" name="interest[]" value="Sport" id="Sport" <?php if ($sport==1) { echo 'checked="checked"';}?>/>
                        <label for="Sport">Sport</label>
                     <input type="checkbox" name="interest[]" value="Software" id="Software" <?php if ($software==1) { echo 'checked="checked"';}?>/>
                        <label for="Software">Software</label>
                    <input type="checkbox" name="interest[]" value="Music" id="Music" <?php if ($music==1) { echo 'checked="checked"';}?>/>
                        <label for="Music">Music</label>
                </td>
            </tr>
            <tr>
                    <td>Avatar</td>
                    <td><input type="file" name="image" id="image" value =<?php echo $rows['avatar']?>></td>
                    <td><img src="<?php echo $rows['avatar']?>" width="44" height="44"></td>
            </tr>	
             <tr>
                    <td>About</td>
                    <td> <textarea name="introduction" id="introudction" row="5" cols="20">
                        </textarea>
                    </td>
            </tr>
            <tr>
                    <td></td>
            </tr>	
	</table>
        <table align="center">
            <tr style="margin-right:15">
                <td> <input type="submit" value="Update" class ="button_add" style ="align: center"  name="update" id="update" /></td>
                <td> <input type="submit" value="Cancel" class ="button_add" style ="align: center"  name="cancel" id="cancel" /></td>
            </tr>
        </table>
	<input type ="hidden" name="id" id="id" value="<?php echo $rows['id']?>">
</form>
</body>
</html>
<?php
mysql_close($conn);
?>