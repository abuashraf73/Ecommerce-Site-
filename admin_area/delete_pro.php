<?php
include("includes/db.php");
if(isset($_GET['delete_pro'])){ //delete pro is the id of the product from another page
	$delete_id = $_GET['delete_pro'];
	$delete_pro = "delete from products where product_id='$delete_id'"; //from that product id, the item is deleted matching the database product id
	$run_delete = mysqli_query($con,$delete_pro);
	if($run_delete){
		echo "<script>alert('Product has been deleted.')</script>";
		echo"<script>window.open('index.php?view_product','_self')</script>";

	}
}
?>