<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("baitap4") or die("Could not select database");

	$query = "SELECT * FROM product";
			
	$result = mysql_query($query,$conn);
?>
<html>
<head>
<title>Danh sách sản phẩm</title>
<meta charset="utf-8"/>
<style type="text/css">
body {
    background-image: url("back.jpg") ;
}
.list {
	border-collapse: collapse;
	width: 90%;
	border-top: 1px solid #DDDDDD;
	border-left: 1px solid #DDDDDD;
	margin-bottom: 20px;

	background-color: #EFEFEF;

}
.list td {
	border-right: 1px solid #DDDDDD;
	border-bottom: 1px solid #DDDDDD;
}
.list tbody tr:hover td {
	background-color: #FFFFCB;
}
.list .left {
	text-align: left;
	padding: 7px;
}
.list .right {
	text-align: right;
	padding: 7px;
}
.list .center {
	text-align: center;
	padding: 7px;
}
.top
{
		padding: 30px;
		font-size: 25px;
		color: red;
}
</style>
<body>
	<?php if(mysql_num_rows($result)) {?>
		<p align = "center" class="top"> Danh sách sản phẩm</p>
		<table class ="list" align = "center">
		<tr>
			<td class = "left">Code</td>
			<td class = "left">Tên Sản Phẩm</td>
			<td class = "right">Số Lượng</td>
			<td class = "right">Giá Sản Phẩm</td>
			<td class = "center">Hình Ảnh</td>
			<td class = "left">Mô tả sản phẩm</td>
			<td class = "center">Thao tác</td>
		</tr>
	 <? while ($rows = mysql_fetch_array( $result )){?>
		 	<tr>
		 	<td class = "left"><? echo $rows['code']?></td>
		 	<td class = "left"><? echo $rows['name']?></td>
		 	<td class = "right"><? echo $rows['quantity']?></td>
		 	<td class = "right"><? echo $rows['price']?></td>
		 	<td class = "center"><img src="./<?echo $rows['product_image']?>" width="44" height="44" ></td>
		 	<td class = "left"><? echo $rows['description']?></td>
		 	<td class = "center" >
  
               	<form action = "view_product.php" method = "POST">
                   		<input type = "hidden" value= "<? echo $rows['id']; ?>" name="id_view" id ="id_view">
                   		<input type="submit" value="View"  name="submit" id="submit" />
                   </form>
                <form action = "form_edit_product.php" method = "POST">
                   		<input type = "hidden" value= "<?echo $rows['id']; ?>" name="id_edit" id ="id_edit">                  		 
                   		<input type="submit" value="Edit"  name="submit" id="submit" />
                   </form>
                   <form action = "delete_product.php" method = "POST">
                   		<input type = "hidden" value= "<?echo $rows['id']; ?>" name="id_delete" id ="id_delete">           		 
                   		<input type="submit" value="Delete"  name="submit" id="submit" onclick="javascript:return confirm('Are you sure to delete this user?');"/>
                   </form>
                </td>
		 </tr>
		 <?}?>
	 </table>
	<?}else {?>
		<p align = "center" style ="font-family: Arial; font-size :20px ; "> Không có sản phẩm</p>
		
	<?}?>
		<p align = "center" class="top">Bạn muốn <a href="form_product.php">Thêm sản phẩm</a></p>
</body>

</head>
</html>
<?mysql_close($conn);?>