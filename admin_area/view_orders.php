<!DOCTYPE html>
<?php 
include ("includes/db.php"); 
if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
?>

<html>
<head>
	<title>View All Orders here </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2 align="center"><u>My Order Details</u></h2>
	<table class="table table-dark">
		<thead>
	<tr>
		<th>S. N. </th>
		<th>Customer Email</th>
		<th>Product Details</th>
		<th>Quantity</th>
		<th>Invoice no</th>
		<th>Order Date</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	include("includes/db.php");
	
	$get_order = "select * from orders";
	$run_order = mysqli_query($con, $get_order);
	$i = 0;
	while($row_order = mysqli_fetch_array($run_order)){
	$order_id = $row_order['order_id'];
	$qty = $row_order['qty'];
	$pro_id = $row_order['p_id'];
	$c_id = $row_order['c_id'];
	$invoice_no = $row_order['invoice_no'];
	$order_date = $row_order['order_date'];
	
	$i++;

$get_pro = "select * from products where product_id='$pro_id'";
$run_pro = mysqli_query($con, $get_pro);
$row_pro = mysqli_fetch_array($run_pro);
$pro_image = $row_pro['product_image'];
$pro_title = $row_pro['product_title'];

$get_c ="select * from customers where customer_id ='$c_id'";
$run_c =mysqli_query($con, $get_c);
$row_c = mysqli_fetch_array($run_c);
$c_email = $row_c['customer_email'];

	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $c_email; ?></td>
		<td><?php echo $pro_title; ?>
		<img src="admin_area/product_images/<?php echo $pro_image; ?>" width="80" height="60">	
		</td>
		<td><?php echo $qty; ?></td>
		<td><?php echo $invoice_no; ?></td>
		<td><?php echo $order_date; ?></td> 
		<td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete order</a></td>
	</tr>
	</tbody>
	<?php } ?>
</table>

</div>
</body>
</html>


<?php } ?>