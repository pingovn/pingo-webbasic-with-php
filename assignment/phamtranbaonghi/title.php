<html>
    <style>
        body{text-align:center;
             background:url("clover-wide.jpg")}
        input{height: 30px}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <body>
        <form
           action="process.php"
           method="post"/>
        Họ và tên học viên: Phạm Trần Bảo Nghi, Bùi Thị Phương Hà, Trần Ngọc Anh
        <br>
        <input
            type="submit"
            name="users"
            value="Users"/>
        <input
            type="submit"
            name="create"
            value="Create User"/>
        <?php session_start(); ?>
        <?php if(!isset($_SESSION['login'])){ ?>
        <input
            type="submit"
            name="login"
            value="Login"/>
        <?php } else { ?>
        <input
            type="submit"
            name="logout"
            value="Logout"/>
        <?php } ?>
        </form>
    </body>  
</html>