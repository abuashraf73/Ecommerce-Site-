<!DOCTYPE html>
<?php 
session_start();
include("admin_area/includes/db.php");
include("functions/functions.php");
 ?>
<html>
<head>
    <title> Sign Up Page </title>
    <link rel="stylesheet" type="text/css" href="signUp.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
  $(document).ready(function(){
    $("form").submit(function(){
      validateform();
    });
    function validateform(){
      var name=$("#c_name").val();
      var email_val=$("#c_email").val();
      var pass_val=$("#c_password").val();
      var cpass_val=$("#confirmpassword").val();
      var city=$("#c_city").val();
      var location=$("#c_loc").val();
      
      var phone=$("#c_phone").val();

      if(name==""){
        alert('Name is required');
      }
      if(phone=="" || phone.length<11){
        alert('Phone number is required');
      }
      if(email_val=="" || email_val.indexOf('@') == -1|| email_val.indexOf(".") == -1){
        alert('Enter a valid email address');
      }
      if(pass_val=="" || pass_val.length<5){
        alert('Enter a valid password');
      }
      if(pass_val!=cpass_val){
        alert('Password doesnt match');
      }
      if(location==""){
        alert('Location is required');
      }
      if(city==""){
        alert('City is required');
      }
     
    }
  });

</script>
    <body>
      <div class="login-box">
          <img src="images/avatar.png" class="avatar">
          <h1>SignUp</h1>
          <form action="customer_register.php" method="post" enctype="multipart/form-data">
           <p>Full Name</p>
            <input type="text" name="c_name" id="c_name" placeholder="Enter Full Name">
            <p>Email Address</p>
            <input type="text" name="c_email" id="c_email" placeholder="Enter Email">            
            <p>Phone Number</p>
            <input type="text" name="c_phone" id="c_phone" placeholder="Enter Phone number">
            <p>Division</p>
               <select name="c_city" id="c_city">
              <option value="Dhaka">Dhaka</option>
              <option value="Barishal">Barishal</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Khulna">Khulna</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Comilla">Comilla</option>
              <option value="Rangpur">Rangpur</option>
              <option value="Mymensingh">Mymensingh</option>
            </select>
            <br><br>
            <p>Address</p>
            <input type="text" name="c_loc" id="c_loc" placeholder="Enter Address" size="60">


            <p>Password</p>
            <input type="password" name="c_password" id="c_password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <p>Confirm password</p>
            <input type="password" name= "confirmpassword" id="confirmpassword" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

            <input type="submit" name="register" value="SUBMIT">
            
          </form>
        </div>

    </body>
</html>
<?php 
if(isset($_POST['register'])){
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phone = $_POST['c_phone'];
    $c_city = $_POST['c_city'];
    $c_loc = $_POST['c_loc'];
   
    $c_password = $_POST['c_password'];

  
//for inserting the data of customer into database
    $insert_c ="INSERT INTO customers(customer_ip,customer_name,customer_email,customer_pass,customer_city, customer_location,customer_contact)   VALUES ('$ip','$c_name','$c_email','$c_password','$c_city','$c_loc','$c_phone')";
    $run_c = mysqli_query($con, $insert_c);
    $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_cart== 0){
      $_SESSION['c_email'] = $c_email;
       echo "<script>alert('Account has been created')</script>";
       echo "<script>window.open('myaccount.php','_top')</script>";
    }else{
        $_SESSION['c_email'] = $c_email;
       echo "<script>alert('Account has been created')</script>";
       echo "<script>window.open('checkout.php','_top')</script>";
    }
} 
?>
