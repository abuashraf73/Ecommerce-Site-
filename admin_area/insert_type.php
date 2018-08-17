<form action="" method="post" style="padding: 80px;">
	<b>Insert New Type</b>
	<input type="text" name="new_type" required>
	<input type="submit" name="add_type" value="Add New Type">
</form>
<?php 
include("includes/db.php");
if(isset($_POST['add_type'])){
$new_type = $_POST['new_type'];
$insert_type = "insert into types (type_title) values('$new_type')";
$run_type = mysqli_query($con, $insert_type);
if($run_type){
	echo"<script>alert('new Type added')</script>";
	echo"<script>window.open('index.php?view_type','_self')</script>";
}}
 ?>
