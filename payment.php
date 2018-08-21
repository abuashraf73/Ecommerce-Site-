<div>
	<?php 
	include("admin_area/includes/db.php");
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

				$product_name = $pp_price['product_title'];
				$values= array_sum($product_price); //oi uporer array er sumation kore show korbe akta value..like total value 
				$total+=$values; 
			}

}
				?>




	<head><b>Pay now with paypal</b></head>
	<br>
	<br>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="abuashraf501-test@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
  <input type="hidden" name="amount" value="<?php echo $total;  ?>">
  <input type="hidden" name="currency_code" value="USD">
 <input type="hidden" name="return" value="localhost/482/482Main/paypal_success.php">
  <input type="hidden" name="cancel_return" value="localhost/482/482Main/paypal_cancel.php">
  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/webstatic/mktg/wright/ecommerce/expresscheckout_buttons.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
<br><br>
</div>