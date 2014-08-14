<?php
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("exercise") or die("Could not select database");

	if(!isset($_POST['id'])){	
		die();
	}
	if(isset($_POST['id'])){
		$code=$_POST['code'];
		$name=$_POST['name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$id=$_POST['id'];
		
		if (($_FILES["img_file"]["type"] != "image/gif") &&
				($_FILES["img_file"]["type"] != "image/png") &&
				($_FILES["img_file"]["type"] != "image/jpeg")&&
				($_FILES["img_file"]["type"] != "image/pjpeg")){
			echo "<script language='javascript'>alert('Kieu file khong hop le');";
			echo "location.href='form_product.php';</script>";
		} else{
			$img=$_FILES['img_file']['name'];
			$link_img='uploads/'.$img;
			$query = "UPDATE products
					  SET code='$code', name='$name', quantity='$quantity', 
					  price='$price', product_image='$link_img', description='$description'
				 	  WHERE id='$id' ";
		//echo $query; die();
		//var_dump($query); die();
		$result=mysql_query($query);
		mysql_free_result($result);
		move_uploaded_file($_FILES['img_file']['tmp_name'],"uploads/".$img);	
		}
	}

	header("Location: view_product.php?id=" .$id);
	exit();
	mysql_close($conn);
?>