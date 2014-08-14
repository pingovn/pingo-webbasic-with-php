<?php
$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("baitap4") or die("Could not select database");

if (!isset($_POST['id_delete'])) {
    echo "No product found.";
    die();
}
	$product_id = $_POST['id_delete'];
	$query1 = "DELETE  FROM product WHERE id = " . $product_id;
	$query = "SELECT * FROM product WHERE id = " . $product_id;
	mysql_query($query1,$conn);		
	$result = mysql_query($query,$conn);
	

?>

<html>
<head>
<title>Xóa Sản Phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}
.text{
	font-size: 20px;
	font-family: Arial;
}


}
</style>
</head>
<body>
<p align ="center" class="text">
	<?if (mysql_num_rows($result) == 0)
		{
			echo "Xóa sản phẩm thành công";
		}
		else echo "Chưa xóa sản phẩm được";
	?>
</p>
<p class="text" align="center">Bạn muốn <a href="form_product.php">Thêm sản phẩm</a>hay <a href="list_product.php">Xem toàn bộ sản phẩm  </p>
</body>
</html>
<?
mysql_close($conn);
?>