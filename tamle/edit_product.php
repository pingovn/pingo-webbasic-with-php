<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");
	
	if(!isset($_GET['id'])){
		echo 'No user found';
		die();
	}
	$product_id=$_GET['id'];
	$query = "SELECT * FROM products WHERE id= ".$product_id;
	$result = mysql_query($query,$conn);
	if(mysql_num_rows($result)==0){
		echo 'No product found';
		die();
	}
	
	$info = mysql_fetch_array($result);

    $query = "SELECT * FROM categories;";
    $result = mysql_query($query, $conn);
    $categories = array();
    while ($row = mysql_fetch_array($result)) {
        $categories[] = $row;
    }

?>

<html>
	<head><title>Edit Product - <?php echo $info['name'];?></title></head>
	<body>
		<form action="update_product.php" method=POST enctype="multipart/form-data">
			<fieldset>
				<legend>EDIT PRODUCT INFORMATIONS</legend>
				<table width="350" border="3" align="left">
					<tr>
						<td>Code:</td>
						<td><input name ='code' type = 'text' size = '38' id = 'code' value="<?php echo $info['code'];?>"></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input name ='name' type = 'text' size = '38' id = 'name' value="<?php echo $info['name'];?>"></td>
					</tr>
					<tr>
						<td>Quantity:</td>
						<td><input name ='quantity' type = 'text' size = '38' id = 'quantity' value="<?php echo $info['quantity'];?>"></td>
					</tr>
					<tr>
						<td>Price:</td>
						<td><input name ='price' type = 'text' size = '38' id = 'price' value="<?php echo $info['price'];?>"></td>
					</tr>
					<tr>
						<td>Image:</td>
						<input type="hidden" name="MAX_FILE_SIZE" value="2048000">
						<td><input name ='img_file' type = 'file' size = '24' id = 'img_file' "></td>
					</tr>
                    <tr>
                        <td>Category:</td>
                        <td><select name="category_id">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?=$category['id'];?>"
                                        <?php if ($info['category_id'] == $category['id']) :?>
                                        selected="selected"
                                        <?php endif ?>
                                    ><?=$category['name'];?></option>
                                <?php endforeach ?>
                            </select></td>
                    </tr>
					<tr>
						<td>Description:</td>
						<td><textarea rows="11" cols="29" name='description' id='description'><?php echo $info['description'];?></textarea></td>
					</tr>
					<tr>
						<td><input name ='update' type = 'submit' value = 'Update'></td>
					</tr>
				</table>
					<input type="hidden" name="id" value="<?php echo $info['id'];?>" />
			</fieldset>
		</form>
	</body>
</html>

<?php
mysql_close($conn);
?>
