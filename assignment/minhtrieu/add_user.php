<?php
session_start();
include("func_include.php");
$_SESSION['page'] = "user";
//var_dump($_POST); var_dump($_FILES); die();
$conn = connect_db();
mysql_select_db('users');

date_default_timezone_set("Asia/Ho_Chi_Minh");

//for ($index = 0; $index < 30; $index++) {
//    $username = "test".$index;
//    $fullname = "Test user " . $index;
//    $email = "testemail{$index}@gmail.com";
//    $query = "INSERT INTO users".
//    "(username, password,fullname, birth, mail,gender, interest, avatar, aboutme)".
//    "VALUES".
//    "('".$username."','1','".$fullname."','0000-00-00','".$email."', 'Male','aa', 'data/nokia-3310.jpg', 'Teacher')";
//    mysql_query($query, $conn);
//}
//echo "Insert successfully";
//mysql_close($conn);
//die();
	
if(isset($_POST['submit'])){
            $post = $_POST;
            user_validation($post,$conn,'');
            //handle file
            if ($_FILES["image"]["error"] > 0) {
                $image_file = "";
            } else {
                $image_file = "upload/{$_FILES['image']['name']}";
                copy($_FILES['image']['tmp_name'],$image_file );
            } 
            $interest = isset($post['interest']) ?  serialize($post['interest']) : "";
            $tmp= preg_split('/\//', $post['birthday']);
            $date_db = $tmp[2] . "-" . $tmp[1] . "-" . "$tmp[0]";
            
//            var_dump($post['birthday']); var_dump($date);die();
//            var_dump($date); die();
//            var_dump($post); var_dump($post['interest']);var_dump($interest); die();
            $sql = "INSERT INTO users
                    (username, password,fullname, birth, mail,gender, interest, avatar, aboutme) ".
                    " VALUES ('"
                    .$post['username']     ."','"
                    .md5($post['password'])     ."','"
                    .$post['fullname']     ."','"
                    .$date_db               ."','"
//                    .$post['birthday']        ."','"
                    .$post['email']        ."','"
                    .$post['gender']       ."','"
                    .$interest              ."','"
                    .$image_file            ."','"
                    .$post['introduction']  ."')";
            mysql_query($sql,$conn);
            echo 'Welcome '.$post['fullname'].'<br/>';
}	

//$sql = "SELECT * FROM users";
//$result = mysql_query($sql);
//while ($rows = mysql_fetch_array($result)) {
//  $birth  = $rows['birth']  ;
//  $age = calc_age($birth);
//  var_dump($age);
//}
mysql_close($conn);
header('Location:list_user.php?mess=Wellcome ' . $post['fullname'] );
exit();
?>