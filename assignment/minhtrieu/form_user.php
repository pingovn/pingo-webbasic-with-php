<?php
session_start();
$_SESSION['page'] = 'create_user';
?>

<html>
    <head>
        <title> User Registration</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen,projection" type="text/css" href="style.css" />
    </head>
    <body>
        <form action ="add_user.php" method="post" enctype="multipart/form-data">
            <?php include("form_include.php"); ?>
            <p align="center" style="font-size:30; color: blue">Create new User</p> 
                <!--Validaton message-->
            <?php if (isset($_GET['mess'])) { ?>
                  <p align="center"><font color="red"><?php echo $_GET['mess'];?></font></p> 
            <?php    }  ?>
            <table    cellpadding="2px" align="center">
                <tr>
                    <td>Username</td>
                    <td><input type=text name='username' id='username'/>   </td>
                </tr>
                 <tr>
                    <td>Password</td>
                    <td><input type=password name='password' id='password'/>  </td>
                </tr>
                <tr>
                    <td >Fullname</td>
                    <td><input type=text name='fullname' id='fullname'/>
                    </td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td><input type=date name='birthday' id='birthday' placeholder="dd/mm/yyyy"/> </td> 
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type=text name='email' id='email'/>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td ><select name='gender' id='gender'>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Interest in</td>
                    <td> <input type="checkbox" name="interest[]" value="Sport" id="Sport"/>
                            <label for="Sport">Sport</label>
                         <input type="checkbox" name="interest[]" value="Software" id="Software"/>
                            <label for="Software">Software</label>
                        <input type="checkbox" name="interest[]" value="Music" id="Music"/>
                            <label for="Music">Music</label>
                    </td>
                </tr>
                <tr>
                    <td>Avatar </td>
                    <td><input type="file" name="image" id="file" accept="image/*"></td>
                </tr>
                <tr>
                    <td>About</td>
                    <td> <textarea name="introduction" id="introudction" row="5" cols="20">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" value="Create" name="submit" id="submit"/>
                </tr>
            </table>
        </form>
    </body>
</html>