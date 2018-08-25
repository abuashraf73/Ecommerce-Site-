<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
    width: 700px;
    padding-left: 450px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h1 align="center">Admin Panel</h1>
<h2 style="color: black; text-align: center;"><?php echo @$_GET['not_admin']; ?></h2>
<form method="post" action="login.php">
 

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
<?php 
//email and password validation 
include("includes/db.php");
if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($con, $_POST['email']);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
    $password = mysqli_real_escape_string($con, $_POST['password']); //this is used for security purposes

    $sel_user = "select * from admins where user_email='$email' AND user_pass='$password'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user==0){
      echo "<script>alert('Password or Email is incorrect, try again')</script>";
    }
    else{
      $_SESSION['user_email'] = $email;
      echo "<script>alert('Welcome back..')</script>";
      echo "<script>window.open('index.php?Logged_in=You have successfully logged in','_self')</script>";
    }
}

 ?>