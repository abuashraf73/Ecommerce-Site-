<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Successful</title>
</head>
<body>
	<?php //this is all for product details
include("admin_area/includes/db.php");
include("functions/functions.php");
	$total = 0; // agei instantiate kore dilam j zero
	global $con;
	$ip=getIp();
	$sel_price = "select * from cart where ip_add='$ip'";
	$run_price=mysqli_query($con, $sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id=$p_price['p_id'];//ip address wise product er id ta dibe, from there we can tell what is the prrice of product
		$pro_price = "select * from products where product_id='$pro_id'"; // cart table theke product id ta niye seta k product table er product ider sathe match kortese
		$run_pro_price = mysqli_query($con, $pro_price);
		while($pp_price = mysqli_fetch_array($run_pro_price)){// product table theke product id wise product price ta niye ashtese
				$product_price= array($pp_price['product_price']); //that certain user joto product cart a add korsilo segula sob k akta array te rakhlam

				$product_id = $pp_price['product_id'];

				$values= array_sum($product_price); //oi uporer array er sumation kore show korbe akta value..like total value 
				$total+=$values;
		
			} }
			//this is for getting the quantity 
			$get_qty = "select * from cart where p_id='$pro_id'";
			$run_qty = mysqli_query($con, $get_qty); 
			$row_qty = mysqli_fetch_array($run_qty);
			$qty = $row_qty['qty'];
			if($qty == 0){
				$qty =1;
			}
			else
			{
				$qty=$qty;
				$total = $total* $qty;
			}


		//this is about the customer
		$user = $_SESSION['c_email'];
        $get_c = "select * from customers where customer_email = '$user'";
        $run_c= mysqli_query($con,$get_c);
        $row_c = mysqli_fetch_array($run_c);
        $c_id = $row_c['customer_id'];

        //payment details from paypal

        $amount = $_GET['amt'];
        $currency = $_GET['cc'];
        $trx_id = $_GET['tx'];
        $invoice = mt_rand();
//inserting the payment to the database table
        $insert_payment = "insert into payment(amount, customer_id, product_id,trx_id, currency, date) values('$amount','$c_id','$pro_id','$trx_id','$currency',NOW())";

        $run_payment = mysqli_query($con, $insert_payment);
//inserting the order into database
        $insert_order ="insert into orders (p_id,c_id,qty,invoice_no,order_date, status) values('$pro_id','$c_id','$qty','$invoice',NOW(),'in progress')";
        $run_order = mysqli_query($con, $insert_order);

        //removing the products from cart
        $empty_cart = "delete from cart";
        $run_cart = mysqli_query($con, $empty_cart);

        if($amount == $total){
        	echo "<h1>Welcome: ". $_SESSION['customer_email']."<br>". "Your payment was Successful</h1>";
        	echo "<a href='localhost/482/482Main/myaccount.php'>Go to my Account</a>";
        }
        else{
        	echo "<h2>Welcome Guest, Payment Failed</h2>";
        	echo "<a href='localhost/482/482Main/home.php'>Go Back to home page</a>";

        }

 ?>
</body>
</html>
<!-- this part is for automated email sending -->
<?php
$headers = "MIME-Version: 1.0". "\r\n";
$headers.="Content-type:text/html:charset=UTF-8"."\r\n";
$headers.='From: <sales@onlineshoppers.com>'."\r\n";
$subject="Order details";
$message ="<html>
<p>
Hello Dear <b></b>"

 ?>