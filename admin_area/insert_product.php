<!DOCTYPE html>
<?php 
include ("includes/db.php"); 
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
?>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		body{
			background-color: lightblue;
		}
	</style>
</head>
<body>
<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center" width="800" height="600" border="5" bgcolor="skyblue">
		<tr align="center">
			<td colspan="20"><h2 align="center"><strong>Insert New Product here</strong></h2></td>
		</tr>
		<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" size="50" /></td>
		</tr>
		
		<tr>
			<td align="right">Product Category:</td>
			<td><select name="product_category" >
				<option>Select Category</option>
				<!--Getting the category list directly from the database -->
				<?php
					 $get_cats = "select * from catagories";
					$run_cats = mysqli_query($con, $get_cats);
					while ($row_cats = mysqli_fetch_array($run_cats)) {
					$cat_id =$row_cats['category_id'];
					$cat_title=$row_cats['category_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
						} ?>
				</select></td>
		</tr>

		<tr>
			<td align="right">Product Price(tk):</td>
			<td><input type="text" name="product_price"></td>
		</tr>
		<tr>
			<td align="right">Product Description:</td>
			<td ><textarea name="product_description" cols="60" rows="20"></textarea></td>
		</tr>
		<tr>
			<td align="right">Product Image:</td>
			<td><input type="file" name="product_image"></td>
		</tr>
		<tr>
			<td align="right">Product Keyword:</td>
			<td><input type="text" name="product_keyword" size="60" ></td>
		</tr>
		<tr>
			<td align="right">Product Type:</td>
			<td><select name="product_type">
				<option>Select Product Type</option>
				<!--Getting the types list directly from the database -->
				<?php
				$get_type = "select * from types";
				$run_type = mysqli_query($con, $get_type);
				while ($row_type = mysqli_fetch_array($run_type)) {
				$type_id =$row_type['type_id'];
				$type_title=$row_type['type_title'];
				echo "<option value='$type_id'>$type_title</option>";
				}
				?>
			</select></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input type="submit" name="insert_post" value="INSERT"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<!-- Putting data from the form to the database -->
<?php 

if (isset($_POST['insert_post'])) {
	//getting the text from the form
	$product_title = $_POST['product_title'];
	$product_category = $_POST['product_category'];
	$product_price = $_POST['product_price'];
	$product_description = $_POST['product_description'];
	$product_keyword = $_POST['product_keyword'];
	$product_type = $_POST['product_type'];

	//image insertion
	$target_dir = "product_images/";
	$target_file = $target_dir . basename($_FILES['product_image']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	//database query to insert data to the database
	 $insert_product="INSERT INTO products(product_title,product_category,product_price,	product_description,product_image,product_keyword,product_type) 		VALUES('$product_title','$product_category','$product_price','$product_description','$target_file','$product_keyword','$product_type')";

	if(mysqli_query($con,$insert_product)){	
		echo "<script>alert('Product has been added')</script>";
		echo"<script>window.open('index.php?insert_product','_self')</script>";		
	}else{
		echo "ERROR: Could not able to execute sql. " . mysqli_error($con);
	}
		mysqli_close($con);

} 

?>
<?php } ?>