<?php
echo <<<EOT
       <table class="table_logo" align="center" >
            <tr>
                <td><img src="logo.gif" width="40" height="32"></td>
                <td>
                     <p align = "center" style="font-family:arial;color:red;font-size:30px;" >Pingo - PHP Basic - Final Assignment</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center" style="font-size:20px;"> Họ và tên học viên: Triệu Thiện Minh</p>
                </td>
            </tr>
        </table>
        <table class="table_login" align="center" cellspacing=0px; >
            <tr>
EOT;
    if ($_SESSION['page'] == 'user') {
         echo ' <td   align="center" bgcolor="#C0C0C0" ><a href="list_user.php"/>  Users   </a></td>';
         echo ' <td   align="center"  ><a href="form_user.php"/>  Create User </a></td>';
           if (isset($_SESSION['login_id'])) { //already  login yet
                   echo '<td align="center" ><a href="logout_user.php"/> Logout </a></td>';
               } else {
                    echo '<td align="center" ><a href="login_form.php"/>  Login  </a></td>';
               }
    } elseif ($_SESSION['page'] == 'create_user') {
         echo ' <td   align="center"  ><a href="list_user.php"/>  Users   </a></td>';
        echo ' <td   align="center" bgcolor="#C0C0C0" ><a href="form_user.php"/>  Create User </a></td>';
        if (isset($_SESSION['login_id'])) { //already  login yet
                   echo '<td align="center" ><a href="logout_user.php"/> Logout </a></td>';
               } else {
                    echo '<td align="center" ><a href="login_form.php"/>  Login  </a></td>';
               }
    } elseif ($_SESSION['page'] == 'log') {
           echo ' <td   align="center"  ><a href="list_user.php"/>  Users   </a></td>';
        echo ' <td   align="center"  ><a href="form_user.php"/>  Create User </a></td>';
          if (isset($_SESSION['login_id'])) { //already  login yet
                   echo '<td align="center" bgcolor="#C0C0C0" ><a href="logout_user.php"/> Logout </a></td>';
               } else {
                    echo '<td align="center" bgcolor="#C0C0C0" ><a href="login_form.php"/>  Login  </a></td>';
               }
    }else {
         echo ' <td   align="center"  ><a href="list_user.php"/>  Users   </a></td>';
        echo ' <td   align="center"  ><a href="form_user.php"/>  Create User </a></td>';
          if (isset($_SESSION['login_id'])) { //already  login yet
                   echo '<td align="center"  ><a href="logout_user.php"/> Logout </a></td>';
               } else {
                    echo '<td align="center"  ><a href="login_form.php"/>  Login  </a></td>';
               }
    }
               
             
echo <<<'EOT'
            </tr>
        </table>
EOT;
?>        
