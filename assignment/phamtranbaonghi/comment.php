<?php
include 'connect.php';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if(!isset($_POST['submit'])){ ?> 
<p style="font-size:22px; text-align:center">Please comment <a href="user_detail.php?id=<?php echo $_GET['id']?>">here</a>.</p> 
<?php } else {
    $comment=test_input($_POST['comment']);
    session_start();
    $auid=$_SESSION['id'];
    $usid=$_GET['id'];
    if ($comment!=NULL){
        $query="INSERT INTO "."comments".
                 "(author_id,comment,user_id) "."VALUES".
                 " ('".$auid."','".$comment."','".$usid."')";
         mysqli_query($link,$query) or die(mysqli_error($link));
         header("Location:user_detail.php?id=$usid");
    mysqli_close($link);     
    }
  } 
  ?>