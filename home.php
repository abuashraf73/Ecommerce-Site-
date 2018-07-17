<!DOCTYPE html>
<?php
session_start(); 
include("functions/functions.php"); ?>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	
</head>
<body>
	<div class="main_wrapper"> <!-- main body -->
		<!-- heaader section -->	
		<div class="header_wrapper"> 
		<?php include("header.php"); ?>
		</div>
		
		<!--navigation bar section -->	
 		 <div id="menubar">
    		<?php include("nav.php"); ?>
	 	 </div>

			<!-- body section is here -->
		<div class="content_wrapper">

			<?php 
			include("slider.php");
			 ?>
			


			<!--side bar categories section -->
			<div id="sidebar">
				<div id="sidebar_title"> <strong>Categories</strong> </div>
					<!-- gettin catagory list from the database -->
				<ul id="cats">
					<?php 
					getCats();
					 ?>
				</ul>
				<br>
				<div id="sidebar_title"> <strong>Types of products</strong> </div>
				<ul id="type">
					<?php 
					getTyp(); ?>
				</ul>

			</div>


			<div id="content_area">
				<?php cart(); ?>
				<div id="shopping_cart">
					<span style="float: right; font-size: 18px; 
					padding: 5px;
					line-height: 40px;
					color: white;"> Welcome Guest!
					<b style="color:black;">Shopping Cart--></b> Total Items: <?php total_items(); ?>
					 Total Price: <?php total_price(); ?>
					<a href="cart.php" style="color:yellow;">Go to cart</a>
					<?php 
					if(!isset($_SESSION['c_email'])){
						echo "<a href='checkout.php'>Login</a> ";
					}
					else{
						echo "<a href='logout.php'>Log out</a>'";
					} ?>
					</span>
				</div>
				<!--for getting the ip address of the user-->
				

				<div id="products_box">
					<?php getProd();?> <!-- category select na korle sob show korbe so eta kaj korbe--> 
					 <?php getCatProd(); ?> <!-- jodi categry select kore tahole eta kaj korbe -->
					 <?php getTypeProd(); ?> <!-- jodi type select kore tahole eta kaj korbe -->
					 <br>
					 <br>
					 <br>
				<input type="button" value="View All products" onclick="window.location.href='all_products.php'"/>
				<br>
				<br>
				<br>
				<br>
				</div>

			</div>

		</div>
			<!-- footer section is here -->
		<div id="footer"><?php 
		include("footer.php"); ?></div>
	</div>

</body>
</html>