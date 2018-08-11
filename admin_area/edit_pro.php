<!DOCTYPE html>
<?php 
include ("includes/db.php"); 
//for feteching all the products from the database
if(isset($_GET['edit_pro'])){
	$get_id= $_GET['edit_pro'];
	$get_pro = "select * from products where product_id= '$get_id'";
	$run_pro = mysqli_query($con, $get_pro);
	$i = 0;
	$row_pro = mysqli_fetch_array($run_pro);
	$pro_id = $row_pro['product_id'];
	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_image'];
	$pro_price = $row_pro['product_price'];
	$pro_desc  = $row_pro['product_description'];
	$pro_key  = $row_pro['product_keyword'];
	$pro_cat = $row_pro['product_category'];
	$pro_type = $row_pro['product_type'];

	//for getting the categoery name instead of numbers
	$get_cat = "select * from categories where category_id='$pro_cat'";
	$run_cat = mysqli_query($con, $get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$category_title = $row_cat['category_title'];

	//for getting the type name instead of numbers
	$get_type = "select * from types where type_id='$pro_type'";
	$run_type = mysqli_query($con, $get_type);
	$row_type = mysqli_fetch_array($run_type);
	$type_title = $row_type['type_title'];


}
?>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		body{
			background-color: lightblue;
		
	</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="800" height="600" border="5" bgcolor="skyblue">
		<tr align="center">
			<td colspan="20"><h2 align="center"><strong>Edit & Update Product</strong></h2></td>
		</tr>
		<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" size="50" value="<?php echo $pro_title; ?>" /></td>
		</tr>
		
		<tr>
			<td align="right">Product Category:</td>
			<td><select name="product_category" >
				<option><?php echo $category_title; ?></option>
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
			<td><input type="text" name="product_price" value="<?php echo $pro_price; ?>" ></td>
		</tr>
		<tr>
			<td align="right">Product Description:</td>
			<td ><textarea name="product_description" cols="60" rows="10"><?php echo $pro_desc; ?></textarea></td>
		</tr>
		<tr>
			<td align="right">Product Image:</td>
			<td><input type="file" name="product_image"><img src="product_images/<?php echo $pro_image; ?>" width="80" height="100"/></td>
		</tr>
		<tr>
			<td align="right">Product Keyword:</td>
			<td><input type="text" name="product_keyword" size="60" value="<?php echo $pro_key; ?>" ></td>
		</tr>
		<tr>
			<td align="right">Product Type:</td>
			<td><select name="product_type">
				<option><?php echo $type_title; ?></option>
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
			<td colspan="8"><input type="submit" name="update_product" value="UPDATE"/></td>
		</tr>
	</table>
</form>
</body>
</html>
<!-- Putting data from the form to the database -->
<?php 

if (isset($_POST['update_product'])) {
	//getting the text from the form
	$update_id = $pro_id;
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
	 $update_product="update products set product_category='$product_category', product_type='$product_type', product_title='$product_title', product_price='$product_price',product_description='$product_description', product_image='$target_file', product_keyword='$product_keyword' where product_id='$update_id'";

	if(mysqli_query($con,$update_product)){	
		echo "<script>alert('Product has been updated')</script>";
		echo"<script>window.open('index.php?view_product','_self')</script>";		
	}else{
		echo "ERROR: Could not able to execute sql. " . mysqli_error($con);
	}
		mysqli_close($con);

} 

?>