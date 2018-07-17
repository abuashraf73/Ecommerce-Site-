<?php
$con = mysqli_connect("localhost","root","","onlineshoppers");

//for getting the ip address of the user
function getIp(){
	$ip=$_SERVER['REMOTE_ADDR'];
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip= $_SERVER['HTPP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $ip;
}

//creating the cart
function cart(){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getIp(); //returns the ip address of the user
		$pro_id=$_GET['add_cart']; //gets the product id from the user input when the user clicks "add to cart"
		$check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'"; //from the database, checks if the user already has product he clicked 
		$run_check=mysqli_query($con,$check_pro); 
		if(mysqli_num_rows($run_check)>0){ //if it has records then echo nothing
			echo""; //same product already database a thakle then do nothing, u cant add anything thats alreeady in the cart
		}else{ //if the record is empty then user can add items to cart
			$insert_pro="insert into cart(p_id,ip_add) values ('$pro_id','$ip')";
			$run_pro=mysqli_query($con,$insert_pro);
			echo"<script>window.open('home.php','_self')</script>";
		}
			//ip address wise product id add korbe database a
	}
}
//getting the total added items for the cart
function total_items(){

	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getIp();

		$get_items = "select * from cart where ip_add='$ip'"; //this statement will get the ip address using the getip function above and match it with the database to see if any products are there corresponding to this ip

		$run_items = mysqli_query($con, $get_items);

		$count_items= mysqli_num_rows($run_items);
	}
		else{
			$ip=getIp();
        global $con;
		$get_items = "select * from cart where ip_add='$ip'";//the ip address will have the products that the user added into the cart and show it using this function

		$run_items = mysqli_query($con, $get_items);

		$count_items= mysqli_num_rows($run_items);

		}
		echo $count_items;

}
//getting the total price in the cart
function total_price(){
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
				$values= array_sum($product_price); //oi uporer array er sumation kore show korbe akta value..like total value 
				$total+=$values;
		
		}

	}
	echo $total;
}
//getting the categories from mysql
function getCats(){
	global $con;
	$get_cats = "select * from catagories";
	$run_cats = mysqli_query($con, $get_cats);
	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id =$row_cats['category_id'];
		$cat_title=$row_cats['category_title'];

		echo "<li><a href='home.php?category=$cat_id'>$cat_title</a></li>";
	}

}
//showing the type of products we are selling
function getTyp(){
	global $con;
	$get_type = "select * from types";
	$run_type = mysqli_query($con, $get_type);
	while ($row_type = mysqli_fetch_array($run_type)) {
		$type_id =$row_type['type_id'];
		$type_title=$row_type['type_title'];

		echo "<li><a href='home.php?type=$type_id'>$type_title</a></li>";
	}

}
//showing the products in the home page in grid view 
function getProd(){
	if(!isset($_GET['category'])){ //category wise product show korbe

		if(!isset($_GET['type'])){ //type wise product show korar jonno 

	global $con;
	$get_pro = "select * from products order by RAND() LIMIT 0,8";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro = mysqli_fetch_array($run_pro)){
		$pro_id=$row_pro['product_id'];
		$pro_title=$row_pro['product_title'];
		$pro_category=$row_pro['product_category'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		
		//'?pro_id=$pro_id' =this is used for passing the id of the product to the next page
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		
		<br>
		<a href='details.php?pro_id=$pro_id'> 
												<img src='admin_area/product_images/$pro_image' width='200' height='200'/></a> 


<br>
		<p><i>TK: $pro_price</i></p>


		<button style='background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 5px 3px;
    float:center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 5px 2px;
    cursor: pointer;'>Available</button>
		</div>
		";
	}
}
}}

//product er category wise products show korar jonno ai function ta 
function getCatProd(){
	if(isset($_GET['category'])){ //category wise product show korbe

		$cat_id=$_GET['category']; //getting the category selected from the user
		global $con;
	$get_cat_pro = "select * from products where product_category='$cat_id'"; //matching the selected category with the database

	$run_cat_pro = mysqli_query($con, $get_cat_pro);

	$count_cat=mysqli_num_rows($run_cat_pro); // it will count whether there are products associated with the category or not...
	if($count_cat==0){
		echo"<h2>Sorry, there is no product in this category. </h2>";
		exit(); 
	}

	while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro['product_id'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_category=$row_cat_pro['product_category'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_image'];
 		//'?pro_id=$pro_id' =this is used for passing the id of the product to the next page
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='200' height='200'/>
		<br>
		<p><i>TK: $pro_price</i></p>
		<br>
		<a href='details.php?pro_id=$pro_id'> <button style='background-color: #f44336; /* Green */
														    border: none;
														    color: white;
														    padding: 5px 3px;
														    float:left;
														    text-align: center;
														    text-decoration: none;
														    display: inline-block;
														    margin: 5px 2px;
														    cursor: pointer;
												'>Details</button></a> 

		<a href='home.php?pro_id=$pro_id'><button style='background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 5px 3px;
    float:right;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 5px 2px;
    cursor: pointer;'>Add to Cart</button></a>
		</div>
		";

}}}

function getTypeProd(){
	if(isset($_GET['type'])){ //category wise product show korbe

		$type_id=$_GET['type']; //getting the category selected from the user
		global $con;
	$get_type_pro = "select * from products where product_type='$type_id'"; //matching the selected category with the database

	$run_type_pro = mysqli_query($con, $get_type_pro);

	$count_type=mysqli_num_rows($run_type_pro); // it will count whether there are products associated with the category or not...
	if($count_type==0){
		echo"<h2>Sorry, there is no product in this type. </h2>";
		exit(); 
	}
	
	while($row_type_pro = mysqli_fetch_array($run_type_pro)){
		$pro_id=$row_type_pro['product_id'];
		$pro_title=$row_type_pro['product_title'];
		$pro_category=$row_type_pro['product_category'];
		$pro_price=$row_type_pro['product_price'];
		$pro_image=$row_type_pro['product_image'];
 		//'?pro_id=$pro_id' =this is used for passing the id of the product to the next page
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='200' height='200'/>
		<br>
		<p><i>TK: $pro_price</i></p>
		<br>
		<a href='details.php?pro_id=$pro_id'> <button style='background-color: #f44336; /* Green */
														    border: none;
														    color: white;
														    padding: 5px 3px;
														    float:left;
														    text-align: center;
														    text-decoration: none;
														    display: inline-block;
														    margin: 5px 2px;
														    cursor: pointer;
												'>Details</button></a> 

		<a href='home.php?pro_id=$pro_id'><button style='background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 5px 3px;
    float:right;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 5px 2px;
    cursor: pointer;'>Add to Cart</button></a>
		</div>
		";

}}}
?>
