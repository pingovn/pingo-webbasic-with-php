<?php
    session_start();
    include 'db/dbconnect.php';
    $conn = connect();
    $post = $_POST;
    if(isset($post['login']))
    {
        $sql="SELECT * FROM users WHERE "
                . "username='" .$post['username'] ."' and"
                . " password='" . $post['password']. "'";
//        echo $sql;
        $result = mysql_query($sql,$conn);
        $count = mysql_num_rows($result);
//        echo $count;
        if($count==1){
            $_SESSION['username'] = $post['username'];
            var_dump($_SESSION['username']);
            $_SESSION['password'] = $post['password'];
            echo "Login success ";
            header("refresh:3;url=list_users.php");
        }
        else {
            echo "Sai tên đăng nhập hoặc mật khẩu";
            header("refresh:3;url=form_login.php");
        }
    } else {
        header("location:form_login.php");
    }
?>
