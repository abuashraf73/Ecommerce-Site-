<?php 
session_start(); //admnin login section
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{

//if the user is admin then he/she see this action
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
</head>
<body>
<div class="main_wrapper">
	<div id="header">
	</div>
	<div id="left">
		<h2 align="center">Welcome </h2>
		<?php 
		if(isset($_GET['insert_product'])){
			include("insert_product.php");
		}
		if(isset($_GET['view_product'])){
			include("view_product.php");
		}
		if(isset($_GET['edit_pro'])){
			include("edit_pro.php");
		} 
		if(isset($_GET['insert_cat'])){
			include("insert_cat.php");
		}
		if(isset($_GET['view_cats'])){
			include("view_cats.php");
		}
		if(isset($_GET['edit_cat'])){
			include("edit_cat.php");
		}
		if(isset($_GET['insert_types'])){
			include("insert_type.php");
		}
		if(isset($_GET['view_types'])){
			include("view_types.php");
		}
		if(isset($_GET['edit_type'])){
			include("edit_type.php");
		}
		if(isset($_GET['view_customers'])){
			include("view_customers.php");
		}
		if(isset($_GET['view_orders'])){
			include("view_orders.php");
		}
		if(isset($_GET['view_payments'])){
			include("view_payments.php");
		}?>
	</div>
	<div id="right"><br>
<h2 style="text-align:center;"><u>Manage Content</u></h2>

<a href="index.php?insert_product">Insert Product</a>
<a href="index.php?view_product">View Products</a>
<a href="index.php?insert_cat">Insert Category</a>
<a href="index.php?view_cats">View All Categories</a>
<a href="index.php?insert_types">Insert Types</a>
<a href="index.php?view_types">View All Types</a>
<a href="index.php?view_customers">View Customers</a>
<a href="index.php?view_orders">View Orders</a>
<a href="index.php?view_payments">View Payment</a>
<a href="logout.php">Log out</a>
	</div>
</div>
</body>
</html>
<?php 
		include("includes/db.php");
		if(isset($_GET['confirm_order'])){
		$get_id = $_GET['confirm_order'];
		$status ='completed';
		$update_order="update orders set status='$status' where order_id='$get_id'";
		$run_update = mysqli_query($con, $update_order);
		if($run_update){
		echo "<script>alert('order was updated')</script>";
		echo "<script>window.open('index.php?view_orders','_self')</script>";
	}
	}
 ?>
<?php } ?>
