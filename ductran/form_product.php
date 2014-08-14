<html>
<head>
<title>Thêm Sản Phẩm</title>
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
</style>
</head>
<body>
<form action= "add_product.php" method ="POST" enctype="multipart/form-data" >
<table align = "center" width = "300" >
	<tr ><p align = "center" style="font-family:arial;color:red;font-size:30px;" >Thêm Sản Phẩm</p></tr>
	<tr>
		<td>Code :</td>
		<td><input type ="text" id = "code" name="code"></td>
	</tr>
	<tr>
		<td>Tên Sản Phẩm :</td>
		<td><input type ="text" id = "name" name="name"></td>
	</tr>
	<tr>
		<td>Số Lượng:</td>
		<td><input type ="text" id = "quantity" name="quantity"></td>
	</tr>
	<tr>
		<td>Giá :</td>
		<td><input type ="text" id = "price" name="price"></td>
	</tr>
	<tr>
		<td>Hình ảnh</td>
		<td><input type="file" name="file" id="file"></td>
	</tr>	
	<tr>
		<td>Mô tả Sản Phẩm :</td>
		<td><textarea rows="4" cols="50" id = "des" name ="des"></textarea></td>
	</tr>	
	<tr>
		<td></td>
		<td> <input type="submit" value="Thêm Sản Phẩm" class ="button_add" style ="align = center"  name="submit" id="submit" /></td>
		
	</tr>	
</table>
</form>
</body>
</html>