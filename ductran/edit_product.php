<?php
	$url ='';
	 if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"){
                $path = "data/"; 
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type']; 
                $size = $_FILES['file']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
                $url= $path.$name;  
           
        }

	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("baitap4") or die("Could not select database");

	if (!isset($_POST['id'])) {
  	  echo "No product found.";
  	  die();
	}

	$product_id = $_POST['id'];
	$query1 = "SELECT product_image FROM product WHERE id = " . $product_id;
	$result1 = mysql_query($query1,$conn);

	if (mysql_num_rows($result1) == 0) {
 	   echo "No product found.";
    	die();
	}
	$rows = mysql_fetch_array( $result1);

	$code = $_POST['code'];
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$price =$_POST['price'];
	$des = $_POST['des'];

	if(strcmp('', $url)==0)
	{
		$url = $rows['product_image'];
	}
	$update = "UPDATE product SET code = '" .$code."',name = '".$name ."',quantity = '".$quantity."',price ='".$price."',description ='".$des."', product_image ='".$url."' WHERE id = ".$product_id;
	
	 mysql_query($update,$conn);
	
?>

<html>
<head>
<title>Chỉnh sửa sản phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}

</style>
</head>
<body>
<p align = "center">Bạn đã cập nhật thành công</a></p>
<p align = "center">Bạn muốn <a href="list_product.php">Xem danh sách sản phẩm</a></p>
<p align = "center">Bạn muốn <a href="form_product.php">Thêm sản phẩm</a></p>
</body>
</html>
<?
mysql_close($conn);
?>