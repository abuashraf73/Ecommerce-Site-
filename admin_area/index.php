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
		}?>
	</div>
	<div id="right"><br>
<h2 style="text-align:center;"><u>Manage Content</u></h2>
<br>
<a href="index.php?insert_product">Insert Product</a>
<a href="index.php?view_product">View Products</a>
<a href="index.php?insert_cat">Insert Category</a>
<a href="index.php?view_cats">View All Categories</a>
<a href="index.php?insert_types">Insert Types</a>
<a href="index.php?view_types">View All Types</a>
<a href="index.php?view_customers">View Customers</a>
<a href="index.php?view_orders">View Orders</a>
<a href="index.php??view_payment">View Payment</a>
<a href="logout.php">Log out</a>
	</div>
</div>
</body>
</html>