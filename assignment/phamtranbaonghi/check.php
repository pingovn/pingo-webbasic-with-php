<?php
include 'connect.php';
?>
<?php function error(){
      $_SESSION['error']="YES";
      header("Location:login.php");  }
?>

<?php
session_start();
if (isset($_POST['login'])){
if (!isset($_POST['user']) or !isset($_POST['pass'])){
    error();
} else {
    $query="SELECT * FROM users WHERE username='"
            .$_POST['user']."' and password=PASSWORD('".$_POST['pass']."')";
    $result= mysqli_fetch_array(mysqli_query($link, $query));
    if (null!=$result){
       $_SESSION['login']="YES";
       $_SESSION['id']=$result['id'];
       header("Location:user_detail.php?id=".$result['id']);
    } else {
    error();    
    }
   }   
 }
 mysqli_close($link);
?>