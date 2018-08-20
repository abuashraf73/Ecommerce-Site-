<form action="" method="post" style="padding: 80px;">
	<b>Insert New Type</b>
	<input type="text" name="new_type" required>
	<input type="submit" name="add_type" value="Add New Type">
</form>
<?php 
include("includes/db.php");
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
if(isset($_POST['add_type'])){
$new_type = $_POST['new_type'];
$insert_type = "insert into types (type_title) values('$new_type')";
$run_type = mysqli_query($con, $insert_type);
if($run_type){
	echo"<script>alert('new Type added')</script>";
	echo"<script>window.open('index.php?view_type','_self')</script>";
}}
 ?>
<?php } ?>