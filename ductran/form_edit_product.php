<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("baitap4") or die("Could not select database");

if (!isset($_POST['id_edit'])) {
    echo "No product found.";
    die();
}
	$product_id = $_POST['id_edit'];
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
<title>Chỉnh sửa sản phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}
.button_add{
	font-family: Arial;
	font-size: 12px;
	padding: 10px;
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
<form action= "edit_product.php" method ="POST" enctype="multipart/form-data" >
	<table align = "center" width = "300" >
		<tr ><p align = "center" class="top">Chỉnh sửa thông tin sản phẩm</p></tr>
		<tr>
		<td>Code :</td>
			<td><input type ="text" id = "code" name="code" value =<?=$rows['code']?>></td>
		</tr>
		<tr>
			<td>Tên Sản Phẩm :</td>
			<td><input type ="text" id = "name" name="name" value ="<?=$rows['name']?>"></td>
		</tr>
		<tr>
			<td>Số Lượng:</td>
			<td><input type ="text" id = "quantity" name="quantity" value =<?=$rows['quantity']?>></td>
		</tr>
		<tr>
			<td>Giá :</td>
			<td><input type ="text" id = "price" name="price" value =<?=$rows['price']?>></td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td><input type="file" name="file" id="file" value =<?=$rows['product_image']?>></td>
			<td><img src="<?=$rows['product_image']?>" width="44" height="44"></td>
		</tr>	
		<tr>
			<td>Mô tả Sản Phẩm :</td>
			<td><textarea rows="4" cols="50" id = "des" name ="des" ><?=$rows['description']?></textarea></td>
		</tr>	
		<tr>
			<td></td>
			<td> <input type="submit" value="Cập Nhật" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
		</tr>	
	</table>
	<input type ="hidden" name="id" id="id" value="<?=$rows['id']?>">
</form>
</body>
</html>
<?
mysql_close($conn);
?>