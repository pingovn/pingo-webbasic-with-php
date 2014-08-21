<?php
if (isset($_POST['users'])){
    header("Location:list_users.php");
} elseif (isset($_POST['create'])){
    header("Location:create_user.php");
} elseif (isset($_POST['login'])) {
    header("Location:login.php");
} elseif (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header("Location:title.php");
} else { ?>    
<p style='text-align:center; font-size:30px;'><a href='title.php'>Choose something!</a></p>
<?php } ?>