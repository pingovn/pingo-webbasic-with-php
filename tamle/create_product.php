<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	if(isset($_POST['save'])){
		
		$code=$_POST['code'];
		$name=$_POST['name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$description=$_POST['description'];
        $categoryId = $_POST['category_id'];
		
		if(!isset($POST['id'])){
				if (($_FILES["img_file"]["type"] != "image/gif") &&
					($_FILES["img_file"]["type"] != "image/png") &&
					($_FILES["img_file"]["type"] != "image/jpeg")&&
					($_FILES["img_file"]["type"] != "image/pjpeg")){
					echo "<script language='javascript'>alert('Kieu file khong hop le');";
					echo "location.href='form_product.php';</script>";
				} else{
					$img=$_FILES['img_file']['name'];
					$link_img='uploads/'.$img;
					$query = "INSERT INTO products (code, name, quantity, price, product_image, description, category_id)
					VALUES ('$code','$name','$quantity','$price','$link_img','$description', '$categoryId')";
					//$query="INSERT INTO products(product_image) values('".$link_img."')";
					mysql_query($query);
					//echo $query;
					move_uploaded_file($_FILES['img_file']['tmp_name'],"uploads/".$img);
				}	
		}
	}
?>
<html>
	<head><title>Create Product</title></head>
	<body>
		Add new successfully. <br/>
		Click <a href="list_product.php">here</a> to view all products.<br/>
		Click <a href="form_product.php">here</a> to add more.
	</body>
</html>
<?php mysql_close($conn);?>