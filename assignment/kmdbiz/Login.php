 <table border="1" align = "center" width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0"   >
      
        <form action = list_user.php> 
        <td> <input type="submit" value="User" class ="button_add" style ="align = center"  /></td>
        </form>
<form action = Form_user.php> 
        <td> <input type="submit" value="Create User" class ="button_add" style ="align = center"   /></td>
        </form>
<form action = Login.php> 
        <td> <input type="submit" value="Login" class ="button_add" style ="align = center"   /></td>
        </form>
<form action = Logout.php> 
        <td> <input type="submit" value="Logout" class ="button_add" style ="align = center"   /></td>
        </form>

            
       	
    </table>
<?php 
    mysql_connect("localhost","root",""); 
    mysql_select_db("simple_login"); 
?>
<?php 
    session_start();    
    if (isset($_SESSION['username'])){                
       echo "xin chao ".$_SESSION['username'];
    }else{
        if(isset($_POST['submit'])){
            $sql=mysql_query('SELECT * FROM user where username="'.$_POST['user'].'" and password="'.$_POST['pass'].'"');
            if(mysql_num_rows($sql)>0){
                echo "dang nhap thanh cong, xin chao ".$_POST['user'];    
                $_SESSION['username']=$_POST['user'];                    
            }else echo'Ten dang nhap hoac mat khau chua dung';
        }
   }
?>
<form action= "code_exec.php" method ="POST" enctype="multipart/form-data" >
    <table border="1" align = "center" width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0"> 
	<tr ><p align = "center" style="font-family:arial;color:green;font-size:30px;" >User Login</p></tr>
        
	<tr>
		<td>Username </td>
		<td><input type ="text" id = "Username" name="fullname"></td>
	</tr>
        <tr>
                <td>Password </td> 
                <td><input type ="password" id ="Password" name ="Password"></td>
        </tr>
<tr>
		<td></td>
                <td> <input type="submit" value="login" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
	</tr>	
</table>
</form>

