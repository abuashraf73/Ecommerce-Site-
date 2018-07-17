<!DOCTYPE html>
<?php
session_start(); 
include("functions/functions.php"); 
?>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<style>
table, th, td {
    border: 3px solid black;
    width: 950px;
    align:center;
}
</style>
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
					<span style="float: left; font-size: 18px;padding: 5px;line-height: 40px;color: white;"> 
					<?php 
					if(isset($_SESSION['c_email'])){
					echo "<b>Welcome: </b>".$_SESSION['c_email']."<b style='color:yellow;'> Your</b>";}
					else{
						echo "<b>Welcome guest..</b>";
					} ?>

					<b style="color:yellow; align:center;">Shopping Cart--></b> Total Items: <?php total_items(); ?>
					 Total Price: <?php total_price(); ?>
					<a href="home.php" style="color:yellow;">Back to shop</a>
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
					<br>
					<form action="" method="post" enctype="multipart/form-data"  ><!--enctype(ENCode TYPE) attribute specifies how the form-data should be encoded when submitting it to the server. multipart/form-data is one of the value of enctype attribute, which is used in form element that have a file upload. multi-part means form data divides into multiple parts and send to server. -->
						
					<table bgcolor="skyblue">
						
					<tr align="center">
						<th>REMOVE</th>
						<th>PRODUCT(S)</th>
						<th>QUANTITY</th>
						<th>TOTAL PRICE:</th>
					</tr>
<?php 

						                //getting the total price in the cart
							$total = 0; // agei instantiate kore dilam j zero
							global $con;
							$ip=getIp();
							$sel_price = "select * from cart where ip_add='$ip'";
							$run_price=mysqli_query($con, $sel_price);
							while($p_price=mysqli_fetch_array($run_price)){
								$pro_id=$p_price['p_id'];//ip address wise product er id ta dibe, from there we can tell what is the prrice of product
								$pro_price="select * from products where product_id='$pro_id'"; // cart table theke product id ta niye seta k product table er product ider sathe match kortese
								$run_pro_price = mysqli_query($con, $pro_price);
								while($pp_price = mysqli_fetch_array($run_pro_price)){// product table theke product id wise product price ta niye ashtese
										$product_price= array($pp_price['product_price']); //that certain user joto product cart a add korsilo segula sob k akta array te rakhlam
										$product_title=$pp_price['product_title'];// each product er title show korbe
										$product_image=$pp_price['product_image'];//each product er image dekhabe from the database using the id
										$single_price = $pp_price['product_price']; //to show the price of the product
										$values= array_sum($product_price); //oi uporer array er sumation kore show korbe akta value..like total value 
										$total+=$values;
	
 ?>     	
			<tr align="center"> <!--for displaying the contents inside the box-->
					<td><br><br><br><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td> <!-- user can keep or remove the product using this tag -->
					<td><?php echo $product_title; ?> <br>  <!-- to show the title of the product -->
					<img src="admin_area/product_images/<?php echo $product_image; ?>" width="110" height="100" /></td> <!-- to show the image of the product -->
					<td><br><br><br><input type="topdown" size="1" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td> <!-- to add the quantity from the user -->
<?php 
					if(isset($_POST['update_cart'])){
						$qty = $_POST['qty']; //user quantity set korle seta fetch kore anbe aikhane then database a seta seta korbe. 
						$update_qty="update cart set qty='$qty'"; //sei value ta database a giye update korbe
						$run_qty= mysqli_query($con, $update_qty);
						$_SESSION['qty']=$qty; //certain ip person jotobar login korbe tar session ta theke jabe se last bar ki korse seta k save korsi session diye...its a superglobal array
                        $total=($total*$qty);

					} 
?>
					<td><br><br><br><b><?php echo "TK:".$single_price; ?></b></td>
			</tr>

				
<?php } } ?>
			     <tr align="right"> <!--for displaying ttotal price of the products-->
					<td colspan="3" align="center"><b>Sub Total:</b></td>
					<td align="center"><font size="5"><?php echo"TK:".$total; ?></font></td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
					<td><input type="button" value="Continue Shopping" onclick="window.location.href='all_products.php'"/></td>
					<td><input type="button" value="Check Out" onclick="window.location.href='checkout.php'"/></td>
				</tr>
					</table>
					</form>
<?php 

					
					global $con;
					$ip = getIp();
					if(isset($_POST['update_cart'])){  //when update cart is pressed it will get the product id
					foreach ($_POST['remove'] as $remove_id => $rid) {//remove id theke product id ta nitesii to delete it frm the cart of the person
						$delete_product= "delete from cart where p_id='$rid' AND ip_add='$ip'";
						$run_delete = mysqli_query($con,$delete_product);
						if($run_delete){
								echo "<script>window.open('cart.php','_self')</script>"; //if update cart is pressed it will refresh the page
							}
						}
					} 
					if(isset($_POST['continue'])){
					echo "<script>window.open('home.php','_self')</script>"; //if continue shopping is pressed it will forward to home page
										}
						//The @ symbol is the error control operator (aka the "silence" or "shut-up" operator). It makes PHP suppress any error messages (notice, warning, fatal, etc) generated by the associated expression. It works just like a unary operator

						
?>
					
				</div>
			</div>

		</div>
			<!-- footer section is here -->
		<div id="footer"><?php 
		include("footer.php"); ?></div>
	</div>

</body>
</html>