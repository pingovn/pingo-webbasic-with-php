<?php
    include("db/dbconnect.php");
    $conn = connect();
    $post = $_POST;

    if(!isset($post['submit'])) {
       header("location:list_user.php");
    } else {
        $suc = 0;
        $sql = "SELECT avatar FROM users where id = " . $post['id'];
        $result = mysql_query($sql,$conn);
        $rows = mysql_fetch_array($result);
//        var_dump($rows);
        $url ='default_img.jpg';
        if(isset($post['username'])){
            if($_FILES['file']['type'] == "image/jpeg"
                || $_FILES['file']['type'] == "image/png"
                || $_FILES['file']['type'] == "image/gif"){

                  $path = "img_user/"; 
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type']; 
                        $size = $_FILES['file']['size']; 
 
                        move_uploaded_file($tmp_name,$path.$name);
                        $url= $name;  
            } else {
                  $suc = -1;
            }
                
            $interested_str = '';
            foreach ($post['interested_in'] as $key => $value) {
                $interested_str = $interested_str .$value .'\,';
            }
            $interested_str = substr($interested_str,0, -2);
//            echo $url;
            if($url =='default_img.jpg' || $url == $rows['avatar'] ){
                $sql = "UPDATE users SET "
                            . "username = '" .$post['username']."',"
                            . "password = '" .$post['password']."',"
                            . "fullname = '" .$post['fullname']."',"
                            . "birthday = '" .$post['birthday']."',"
                            . "email    = '" .$post['email']."',"
                            . "gender   = '" .$post['gender']."',"
                            . "interested_in = '" .$interested_str. "',"
//                            . "avatar   = " .$url.","
                            . "about    = '" .$post['about']."'"
                        . " WHERE id = " .$post['id'];
                echo $sql;
                mysql_query($sql,$conn);
                header("refesh:2;url=list_user.php");
            } else {
                $sql = "UPDATE users SET "
                            . "username = '" .$post['username']."',"
                            . "password = '" .$post['password']."',"
                            . "fullname = '" .$post['fullname']."',"
                            . "birthday = '" .$post['birthday']."',"
                            . "email    = '" .$post['email']."',"
                            . "gender   = '" .$post['gender']."',"
                            . "interested_in = '" .$interested_str. "',"
                            . "avatar   = '" .$url."',"
                            . "about    = '" .$post['about']."'"
                        . " WHERE id = " .$post['id'];
                echo $sql;
                mysql_query($sql,$conn);
                header("refesh:2;url=list_user.php");
            }

        }		
        mysql_close($conn);
    }
?>

