<?php //to fetch all the category list from the database
include("includes/db.php");
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
if(isset($_GET['edit_type'])){
	$type_id = $_GET['edit_type'];
	$get_type ="select *from types where type_id='$type_id'";
	$run_type=mysqli_query($con, $get_type);
	$row_type =mysqli_fetch_array($run_type);

	$type_id = $row_type['type_id'];
	$type_title = $row_type['type_title'];
}
 ?>


<form action="" method="post" style="padding: 80px;">
	<b>Update Type</b>
	<input type="text" name="new_type" value="<?php echo $type_title; ?>">
	<input type="submit" name="update_type" value="Update Type">
</form>
<?php 
include("includes/db.php");
if(isset($_POST['update_type'])){
	$update_id=$type_id;
$new_type = $_POST['new_type'];
$update_type = "update types set type_title='$new_type' where type_id='$update_id'";
$run_type = mysqli_query($con, $update_type);
if($run_type){
	echo"<script>alert('Type has been updated..')</script>";
	echo"<script>window.open('index.php?view_types','_self')</script>";
}}
 ?>
<?php } ?>