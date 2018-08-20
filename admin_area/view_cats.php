<table width="795" align="center" bgcolor="orange">
	<tr align="center">
		<td colspan="6"><h2>View All Category Here</h2><hr></td>
	</tr>
	<tr align="center" border="2" bgcolor="yellow">
		<th>Category id </th>
		<th>Category Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){   //if the user is not admin then this page goes in the loop
	echo"<script>window.open('login.php?not_admin=You are not an admin','_self')</script>";
}
else{
	$get_cat = "select * from catagories";
	$run_cat = mysqli_query($con, $get_cat);
	$i = 0;
	while($row_cat = mysqli_fetch_array($run_cat)){
	$cat_id = $row_cat['category_id'];
	$cat_title = $row_cat['category_title'];
	
	$i++;
	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $cat_title; ?></td>
	
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td> 
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
		<td></td>

	</tr>
	<?php
}
	?>
</table>
<?php } ?>