<?php //to fetch all the category list from the database
include("includes/db.php");
if(isset($_GET['edit_cat'])){
	$cat_id = $_GET['edit_cat'];
	$get_cat ="select *from catagories where category_id='$cat_id'";
	$run_cat=mysqli_query($con, $get_cat);
	$row_cat =mysqli_fetch_array($run_cat);

	$cat_id = $row_cat['category_id'];
	$cat_title = $row_cat['category_title'];
}


 ?>



<form action="" method="post" style="padding: 80px;">
	<b>Edit Category</b>
	<input type="text" name="new_cat" value="<?php echo $cat_title; ?> ">
	<input type="submit" name="update_cat" value="Update Category">
</form>
<?php //this part gets the category from the form and updates it into the database
include("includes/db.php");
if(isset($_POST['update_cat'])){
	$update_id = $cat_id; //the cat id wil be updated n put into this variable
$new_cat = $_POST['new_cat'];
$update_cat = "update catagories set category_title = '$new_cat' where category_id='$update_id'";
$run_cat = mysqli_query($con, $update_cat);
if($run_cat){
	echo"<script>alert('category updated')</script>";
	echo"<script>window.open('index.php?view_cats','_self')</script>";
}}
 ?>
