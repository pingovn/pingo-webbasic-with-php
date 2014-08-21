<?php
include 'title.php';
include 'connect.php';
$query="SELECT * FROM users WHERE id='".$_GET['id']."'";
$result=mysqli_query($link,$query);
$row=  mysqli_fetch_array($result);
?>

<?php
?>

<html>
    <head>
        <title>User Page</title>
        <style>
            h1{color:#336600}
            img{float:left;}
            table{font-size:20px;
                  margin-left:600px}
            .content{margin-left:400px;
                     margin-right:450px;
                     font-size:19px;
                     text-align:left}
            .border{padding-left:10px;
                    padding-top:7px;
                    padding-bottom:7px;
                    border-style:solid;
                    border-color:#003300;
                    border-width:2px}
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <h1>
        User: <?php echo $row['fullname']; ?>
    </h1>
    <br>
    <body>
        <form
            action="comment.php?id=<?php echo $_GET['id']?>"
            method="post">
        
            <img style="margin-left:400px" src="./<?php echo $row['avatar'] ?>" width="170" height="150" >
        <table  width="380px">
            <tr>
                <td>Username:</td>
                <td><?php echo $row['username']?></td>
            </tr>
            <tr>
                <td>Fullname:</td>
                <td><?php echo $row['fullname']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $row['email']?></td>
            </tr>
            <tr>
                <td>Birthday:</td>
                <td>
                    <?php
                    $bday=  explode("-",$row['birthday']);
                    echo $bday[2]."/".$bday[1]."/".$bday[0];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?php echo $row['gender']?></td>
            </tr>
            <tr>
                <td>Interested In:</td>
                <td><?php echo $row['interest']?></td>
            </tr>
        </table>
        
        <br>
        <p style="margin-left:400px; font-size:19px; text-align:left">
            About me: <br>
            <?php echo $row['about']?>
        </p>
        
        <?php if(!isset($_SESSION['login'])){ ?>
        <div class="content border" >
            Please <a href="login.php">login</a> to add your comment
        </div>
        <?php } else {?>
        <div class="content border">
            Add comment 
            <br>
            <textarea
                name="comment"
                id="cmt"
                rows="8" cols="55">Post your comment here.
            </textarea>
            <input
                type="submit"
                name="submit"
                value="Comment">
        </div>
        <br>
        <?php } ?>
        <?php
        $query2="SELECT * FROM comments WHERE user_id='".$_GET['id']."'";
        $result2=mysqli_query($link, $query2);
        while($row2=mysqli_fetch_array($result2)){ 
            $query3="SELECT * FROM users WHERE id='".$row2['author_id']."'";
            $result3=  mysqli_query($link, $query3);
            $row3=  mysqli_fetch_array($result3);
            ?>
        <div class="content border">
            <img style="padding-right: 10px" src="./<?php echo $row3['avatar'] ?>" width="65" height="50" >
             <a href="user_detail.php?id=<?php echo $row2['author_id']?>">
             <?php echo $row3['fullname']?>
             </a>
             <br>
             <?php echo $row2['comment']?>
             <br>
             <br>
        </div>
        <?php }
        ?>
        </form>
    </body>
</html>
<?php  mysqli_close($link); ?>