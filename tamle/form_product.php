<html>
	<head><title>Form Product</title></head>
	<body>
		<form action="create_product.php" method=POST enctype="multipart/form-data">
			<fieldset>
				<legend>PRODUCT INFORMATIONS</legend>
				<table width="350" border="3" align="left">
					<tr>
						<td>Code:</td>
						<td><input name ='code' type = 'text' size = '38' id = 'code'></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input name ='name' type = 'text' size = '38' id = 'name'></td>
					</tr>
					<tr>
						<td>Quantity:</td>
						<td><input name ='quantity' type = 'text' size = '38' id = 'quantity'></td>
					</tr>
					<tr>
						<td>Price:</td>
						<td><input name ='price' type = 'text' size = '38' id = 'price'></td>
					</tr>
					<tr>
						<td>Image:</td>
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
						<td><input name ='img_file' type = 'file' size = '24' id = 'img_file'></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><textarea rows="11" cols="29" name='description' id='description'></textarea></td>
					</tr>
					<tr>
						<td><input name ='save' type = 'submit' value = 'Save'></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>
