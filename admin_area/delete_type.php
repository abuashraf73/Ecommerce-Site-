<?php
include("includes/db.php");
if(isset($_GET['delete_type'])){ //delete pro is the id of the product from another page
	$delete_id = $_GET['delete_type'];
	$delete_type = "delete from types where type_id='$delete_id'"; //from that product id, the item is deleted matching the database product id
	$run_delete = mysqli_query($con,$delete_type);
	if($run_delete){
		echo "<script>alert('A Type has been deleted.')</script>";
		echo"<script>window.open('index.php?view_types','_self')</script>";

	}
}
?>