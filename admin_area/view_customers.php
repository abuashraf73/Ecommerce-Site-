<table width="795" align="center" bgcolor="orange">
	<tr align="center">
		<td colspan="6"><h2>All Customers List</h2><hr></td>
	</tr>
	<tr align="center" border="2" bgcolor="yellow">
		<th>S. N. </th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone Number</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");
	$get_c = "select * from customers";
	$run_c = mysqli_query($con, $get_c);
	$i = 0;
	while($row_c = mysqli_fetch_array($run_c)){
	$c_id = $row_c['customer_id'];
	$c_name = $row_c['customer_name'];
	$c_email = $row_c['customer_email'];
	$c_phn = $row_c['customer_contact'];
	$i++;
	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $c_name; ?></td>
		<td><?php echo $c_email ?></td>
		<td><?php echo $c_phn; ?></td>
		<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
		<td></td>

	</tr>
	<?php
}
	?>
</table>