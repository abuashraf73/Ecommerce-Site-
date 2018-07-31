<!DOCTYPE html>
<?php session_start(); 
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
			<!--side bar categories section -->
			<div id="sidebar">
				<div id="sidebar_title"> <strong>Company Information </strong> <br>		
				<p1><u>Address:</u> Plot#15, Block-B, Bashundhara Residential Area, Dhaka-1000 </p1>
				<p2><u>Phone:</u>5456412545</p2>
				</div>
				</div>	
			
			<div id="content_area">
				<div id="products_box">
				<?php include("map-google.php");?>
				</div>
			</div>
		</div>
		
			<!-- footer section is here -->
		<div id="footer"><?php 
		include("footer.php"); ?>
		</div>


</body>
</html>