<?php
include 'title.php';
include 'connect.php';
$query="SELECT * FROM users WHERE id='".$_GET['id']."'";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$row= mysqli_fetch_array($result);
?>
<html>
    <head>
        <title>Update User</title>
    <style>
        h1,body{text-align: center;
                color:#336600}
        table{font-size:20px;
              border-style:inset;
              border-color:#33CC33}
        input{height: 30px}
    </style>    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    
    <body>
        <h1>Update user Info</h1>
        <h3><?php echo $row['username']?></h3>
        <form
            action="update.php?id=<?php echo $_GET['id']?>"
            method="post"
            enctype="multipart/form-data"/>
            <table  align='center' width='500px'>
                <tr>
                    <td>Username</td>
                    <td>
                        <input
                            type='text'
                            id='username'
                            name='username'
                            size="50"
                            />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input
                            type='password'
                            id='password'
                            name='password'
                            size="50"/>
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>
                        <input
                            type='text'
                            id='fullname'
                            name='fullname'
                            size="50"/>
                    </td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td>
                        <input
                            type='date'
                            name='bday'/>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input
                            type='email'
                            name='email'
                            size="50"/>
                    </td>                    
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name='gend' id='gend'>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                            <option value='other'>Other</option>
                        </select>    
                    </td>
                </tr>
                <tr>
                    <td>Interested in</td>
                    <td>
                        <input
                            type='checkbox'
                            name='intrs[]'
                            id='sp'
                            value='Sport'/>Sport
                        <input
                            type='checkbox'
                            name='intrs[]'
                            id='Sof'
                            value='Software'/>Software
                        <input
                            type='checkbox'
                            name='intrs[]'
                            id='msc'
                            value='Music'/>Music
                    </td>
                </tr>
                <tr>
                    <td>Avatar</td>
                    <td>
                        <input
                       type="file"
                       id="file"
                       name="image"
                       />
                    </td>
                </tr>
                <tr>
                    <td>About</td>
                    <td><textarea
                            name='about'
                            id='ab'
                            rows='10' cols='40'>      
                        </textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input
                        type='submit'
                        name='update'
                        value='Update'/>
                        <input
                        type='submit'
                        name='cancel'
                        value='Cancel'/>
                    </td>    
                </tr>
            </table>
            <br>
                      
        </form>
    </body>
</html>


