<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("baitap4") or die("Could not select database");

if (!isset($_POST['id_view'])) {
    echo "No product found.";
    die();
}
	$product_id = $_POST['id_view'];
	$query = "SELECT * FROM product WHERE id = " . $product_id;
			
	$result = mysql_query($query,$conn);
	if (mysql_num_rows($result) == 0) {
    echo "No product found.";
    die();
}

	$rows = mysql_fetch_array($result);
?>
<html>
<head>
<title>Chi tiết sản phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}

.content{
float: left;
width: 40%;
padding: 15px;
 margin-left: 150px;
 font-size: 30;
}
.image{
	margin-top: 60px;
}
.table{
	margin-left: 200px;
	width: 80%;

}
.top
{
		padding: 30px;
		font-size: 25px;
		color: red;
}
</style>
</head>
<body>

	<p align = "center" class="top">Bảng chi tiết sản phẩm</p>
<table class="table" border="1" cellspacing="1"  >
	<tr>
		<td>
			<div class = "content">
				<p>Code : <?=$rows['code'];?></p>
				<p>Tên Sản phẩm : <?=$rows['name'];?></p>
				<p>Số Lượng : <?=$rows['quantity'];?></p>
				<p>Giá : <?=$rows['price'];?></p>
				<p>Mô tả : <?=$rows['description'];?></p>
			</div>
			<div class = "image">
				<img src="./<?=$rows['product_image']?> "width="300" height="300">
			</div>		
		</td>
	</tr>	

</table>
<p align = "center">Bạn muốn <a href="list_product.php">Xem danh sách sản phẩm</a></p>
<p align = "center">Bạn muốn <a href="form_product.php">Thêm sản phẩm</a></p>
</body>
</html>
<?
mysql_close($conn);
?>