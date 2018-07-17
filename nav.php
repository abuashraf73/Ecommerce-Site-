<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

#menu{
	padding: 0;
	margin: 0;
	line-height: 55px;
	background: black;
	border-radius: 25px;

}
#menu li{
	list-style: none;
	display: inline;

}
#menu a{
	text-decoration: none;
	color: white;
	padding: 20px;
	margin: 5px;
	font-size: 20px;
	font-family: COMIC SANS MS;


}
#menu a:hover{
	color:blue;
	font-weight: bolder;
	text-decoration: underline;
}

	</style>
</head>
<body>
	<ul id="menu">
	      <li><a href="home.php">Home</a></li>
	      <li><a href="login_page/customer_login.php">My Account</a></li>
	      <li><a href="cart.php">My Cart</a></li>
	      <li><a href="login_page/customer_register.php">Sign Up</a></li>
	      <li><a href="aboutus.php">About Us</a></li>
	    
	    	<!--Search bar section -->
	    	<div id="form">
	    		<form method="get" action="search_result.php" enctype="multipart/form-data">
	    		<input type="text" name="user_query" placeholder="search a product" style="width: 400px; height: 30px">
	    			<input type="submit" name="search" value="Search">
	    			
	    		</form>
	    	</div>

			</ul>

</body>
</html>