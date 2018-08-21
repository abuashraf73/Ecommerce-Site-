<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Successful</title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['customer_email']; ?></h1>
<h2>Your Payment was successful, please go to your account</h2>
<h3><a href="localhost/482/482Main/myaccount.php">Go to My account</a></h3>
</body>
</html>