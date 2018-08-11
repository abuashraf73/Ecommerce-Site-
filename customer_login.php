<style type="text/css">
    .login-box{
    width: 500px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
   margin-left: 185px;
    box-sizing: border-box;
    padding: 30px;
}
.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
  
    top: -50px;
    left: calc(50% - 50px);
}
h1{

    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 42px;
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
    font-size: 25px;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login-box input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box a{
    text-decoration: none;
    font-size: 14px;
    color: white;
}
.login-box a:hover
{
    color: #39dc79;
}

</style>

<?php 
include("admin_area/includes/db.php");
//login-logout script here
if(isset($_POST['login'])){
    $c_email = $_POST['email'];
    $c_pass = $_POST['password']; 
     $sel_c ="select * from customers where customer_pass='$c_pass' AND customer_email= '$c_email'";
     $run_c = mysqli_query($con, $sel_c);
     $check_customer = mysqli_num_rows($run_c);
     if($check_customer==0){
        echo "<script>alert('Password or email is incorrect')</script>";
        exit(); //if the email and password is wrong then futher codes wont work
     }
     $ip= getIp();
      $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer >0 AND $check_cart ==  0){
           $_SESSION['c_email'] = $c_email;
       echo "<script>alert('Logged in successfully')</script>";
       echo "<script>window.open('myaccount.php','_self')</script>";  
    }else{
         $_SESSION['c_email'] = $c_email;
       echo "<script>alert('Logged in successfully')</script>";
       echo "<script>window.open('checkout.php','_self')</script>";
    }
}
 ?>
      <div class="login-box">
          <img src="images/avatar.png" class="avatar">
          <h1>Login/SignUp</h1>
            <form method="post" >
            <p>Username</p>
            <input type="text" name="email" placeholder="Enter User email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Login" formaction="#">
            <a href="customer_register.php"><button style="background-color: #f44336; /* Green */
                                border: none;
                                color: white;
                                padding: 5px 3px;
                             
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                margin: 5px 2px;
                                cursor: pointer;
                        ">Sign up</button></a> <br>
            <a href="checkout.php?forgot_pass">Forget Password? </a>
            </form>
        </div>

  