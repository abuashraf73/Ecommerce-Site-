<table width="795" align="center" bgcolor="orange">
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2><hr></td>
	</tr>
	<tr align="center" border="2" bgcolor="yellow">
		<th>S. N. </th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
	$get_pro = "select * from products";
	$run_pro = mysqli_query($con, $get_pro);
	$i = 0;
	while($row_pro = mysqli_fetch_array($run_pro)){
	$pro_id = $row_pro['product_id'];
	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_image'];
	$pro_price = $row_pro['product_price'];
	$i++;
	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $pro_title; ?></td>
		<td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
		<td><?php echo $pro_price; ?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td> 
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
		<td></td>

	</tr>
	<?php
}
	?>
</table>
<?php } ?>