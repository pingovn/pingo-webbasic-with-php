<?php

$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
mysql_select_db("baitap4") or die("Could not select database");
    $url='';
if(isset($_POST['code'])){
    if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
        // là file ảnh
        // Tiến hành code upload    
            
                // file hợp lệ, tiến hành upload
                $path = "data/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type']; 
                $size = $_FILES['file']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
                $url= $path.$name;  
           
        }else{
           // không phải file ảnh
           echo "Kiểu file hình ảnh không hợp lệ không hợp lệ";
        }
         
        if($url!=''){
		$query = "INSERT INTO product".
				"(code, name, quantity, price,product_image,description)".
				"VALUES".
				"('".$_POST['code']."', '".$_POST['name']."', '".$_POST['quantity']."', '".$_POST['price']."', '".$url."', '".$_POST['des']."')";

		mysql_query($query,$conn);
    }
		
	}		
	mysql_close($conn);
?>
<html>
<head>
<title>Thêm Sản Phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}
#content{
padding: 20px;
}
</style>
<body>
<div id="content" align = "center">
	<p>Bạn đã thêm sản phẩm <?php echo $_POST['name']?></p>
	<p>Bạn muốn <a href="form_product.php">Thêm sản phẩm</a>  </p>
	<p>Bạn muốn<a href="list_product.php">Xem toàn bộ sản phẩm</a></p>

</div>
</body>

</head>
</html>