<?php
include("includes/db.php");
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
if(isset($_GET['delete_c'])){ //delete pro is the id of the product from another page
	$delete_id = $_GET['delete_c'];
	$delete_c = "delete from customers where customer_id='$delete_id'"; //from that product id, the item is deleted matching the database product id
	$run_delete = mysqli_query($con,$delete_c);
	if($run_delete){
		echo "<script>alert('Customer has been deleted.')</script>";
		echo"<script>window.open('index.php?view_customers','_self')</script>";

	}
}
?>
<?php } ?>