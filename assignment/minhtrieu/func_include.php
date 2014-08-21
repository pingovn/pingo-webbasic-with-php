<?php
function connect_db (){
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("final_assignment") or die("Could not select database");
	return $conn;
}

function user_validation ($post,$conn,$edit){
    //1. check password is empty
    if (is_null($post['password']) | $post['password'] == '' ) {
        header("Location:form_user.php?mess=Password is required");
        exit();
    }
    if ($edit == "" ) {
        //2. check if username is exist in database
        $username = GetUserDb($conn, $post['username'], "username");
        if ( !is_null($username)  ) {
            header("Location:form_user.php?mess=username is already exist in database");
            exit(); 
        }
        //3/ check if username is empty
        if (is_null($post['username']) | $post['username'] == '' ) {
            header("Location:form_user.php?mess=username is required");
            exit();
        }
        if ( preg_match ('/\s+/',$post['username'])){
            header("Location:form_user.php?mess=username cannot be space character only");
            exit();
        }
    }
    //4. Check date format
    $tmp = preg_split('/\//', $post['birthday']);
    $date = $tmp[0];
    $month = $tmp[1];
    $year = $tmp[2];
        //4.1 check if date is between 1 -31
        if (($date < 1 ) | ($date > 31)) {
            header("Location:form_user.php?mess=Date must be from 1 to 31 (format: dd/mm/yyyy)");
            exit(); 
        }
        //4.2 check if month is between 1-12
        if (($month < 1 ) | ($month > 12)) {
            header("Location:form_user.php?mess=Month must be from 1 to 12 (format: dd/mm/yyyy)");
            exit(); 
        }
        //4.3 check if the birthday is wrong
        $now = date ("Y-m-d",time());
        var_dump($now);
        $this_year = substr($now,0,4);
        if (($year > $this_year) | ($this_year - $year) > 200 ) {
            header("Location:form_user.php?mess=Year must has 4 digit and you cannot over 200 year-old (format: dd/mm/yyyy)");
            exit(); 
        }
    //5. check email da ton tai trong he thong
     $sql = "SELECT * FROM users WHERE mail ='". $post['email'] ."' ";
    $result = mysql_query($sql,$conn);
    $info = mysql_fetch_array( $result);
    if ( !is_null($info['mail'])  ) {
        header("Location:form_user.php?mess=Email is already exist in database");
        exit(); 
    }  
}

function calc_age ($birth){
  $tmp = date("Y-m-d",time());
  $now = preg_split('/-/',$tmp);
  $birth_year =  preg_split('/-/',$birth);
  $age = $now[0] - $birth_year[0];
//  echo "$birth $tmp <br/>";
//  var_dump($now);
//  var_dump($birth_year);

  return  $age;
}

function GetUserDb($conn,$username,$out_info){
    $sql = "SELECT * FROM users WHERE username ='$username' ";
//    echo $sql; die();
    $result = mysql_query($sql,$conn);
    $info = mysql_fetch_array( $result);
//    var_dump($info);
    echo $info["$out_info"];
    return $info["$out_info"];
}

function paging ($totalRows, $conn, $perPage, $get) {
       
   
    $totalPages = intval(ceil($totalRows / $perPage));
    $interval = 2;

    $currentPage = isset($get['page']) ? intval($get['page']) : 1;
    if ($currentPage == 0) {
        $currentPage = 1;
    }
    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    $from = ($currentPage - 1) * $perPage;
    
if ($currentPage <= $interval) {//display the 1st page (left -> right)
    if ($totalPages == 1) { //don't display th pagination
        $index = 2;
        $range = 1;
    } elseif ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
        $index = 1;
        $range = $totalPages;
    } else { //Tong so trang lon hon so trang can index
        $index = 1;
        $range = 2 * $interval + 1;
    }
} elseif (($currentPage + $interval) >$totalPages){ //display the last page
    if ($totalPages <= 2* $interval) { //Tong so trang nho hon so trang can index
        $index = 1;
        $range = $totalPages;
    } else { //Tong so trang lon hon so trang can index
        $index = $totalPages - 2 * $interval;
        $range = $totalPages;
    }
} else { //display from middle
    $index = $currentPage - $interval;
    $range = $currentPage + $interval;
}
//    echo "$currentPage $totalPages<br/>";
//    echo "$index\t$range <br/>"  ; 
    return  array( $from, $index, $range, $currentPage );
}
?>