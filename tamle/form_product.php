<?php
$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
mysql_select_db("exercise") or die("Could not select database");
$query = "SELECT * FROM categories;";
$result = mysql_query($query, $conn);
$rows = array();
while ($row = mysql_fetch_array($result)) {
    $rows[] = $row;
}
?>
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
                        <td>Category:</td>
                        <td><select name="category_id">
                            <?php foreach ($rows as $row) : ?>
                                <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
                            <?php endforeach ?>
                        </select></td>
                    </tr>
					<tr>
						<td>Description:<
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
