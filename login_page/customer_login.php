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
session_start();
include("c:/xamp/htdocs/482/admin_area/includes/db.php");
 ?>
      <div class="login-box">
          <img src="login_page/avatar.png" class="avatar">
          <h1>Login/SignUp</h1>
            <form method="post" >
            <p>Username</p>
            <input type="text" name="email" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login" formaction="#">
            <input type="submit" name="signup" value="Sign Up" formaction="login_page/customer_register.php">
            <a href="checkout.php?forgot_pass">Forget Password? </a>
            </form>
        </div>

  