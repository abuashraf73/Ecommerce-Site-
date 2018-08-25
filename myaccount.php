<!DOCTYPE html>
<?php
session_start(); 
include("functions/functions.php"); ?>
<html>
<head>
     <title>My Online Shop</title>
     <link rel="stylesheet" type="text/css" href="styles/style.css">
     
</head>
<body>
     <div class="main_wrapper"> <!-- main body -->
          <!-- heaader section --> 
          <div class="header_wrapper"> 
          <?php include("header.php"); ?>
          </div>
          
          <!--navigation bar section -->     
           <div id="menubar">
          <?php include("nav.php"); ?>
           </div>
 
               <!-- body section is here -->
          <div class="content_wrapper">

               <!--side bar categories section -->
               <div id="sidebar">
                    <div id="sidebar_title"> <strong>My Account</strong> </div>
                         <!-- gettin catagory list from the database -->
                    <ul id="cats">
                      <?php 
                      $user = $_SESSION['c_email'];
                       $get_name = "select * from customers where customer_email = '$user'";
                       $run= mysqli_query($con,$get_name);
                       $row = mysqli_fetch_array($run);
                       $c_name = $row['customer_name'];
                       echo "<h1 style='color:skyblue;'>$c_name</h1>";

                       ?>
                       <br>
                       <br>
                         <li><a href="myaccount.php?my_orders">My orders</a></li>
                         <li><a href="myaccount.php?edit_account">Edit Account</a></li>
                       
                        <li><a href="myaccount.php?delete_account">Delete Account</a></li>

                    </ul>
                    <br>
                    
                  </div>

               <div id="content_area">
       

                    
                        <?php cart(); ?>
        <div id="shopping_cart">
          <span style="float: right; font-size: 18px; 
          padding: 5px;
          line-height: 40px;
          color: white;"> <?php 
          if(isset($_SESSION['c_email'])){
          echo "<b>Welcome: </b>".$_SESSION['c_email'];
        }
           ?>
         
          <?php 
          if(!isset($_SESSION['c_email'])){
            echo "<a href='checkout.php'>Login</a> ";
          }
          else{
            echo "<a href='logout.php'>Log out</a>'";
          } ?>
          </span>
        </div>
                    <div>
                    <h1 align="center">welcome <?php echo $c_name; ?></h1> 
                    <br>
                    <?php 
                    if(!isset($_GET['my_orders'])){
                      if(!isset($_GET['edit_account'])){
                      
                          if(!isset($_GET['delete_account'])){
                     echo "<h3 align='center'>See progress <a href='myaccount.php?my_orders'>LINk</a></h3> ";
                     }
                   }
                    }
                  
                    ?>
                    <?php 
                    if(isset($_GET['edit_account'])){
                      include("edit_account.php");
                    }
                    
                    if(isset($_GET['delete_account'])){
                      include("delete_account.php");
                    
                    }
                    if(isset($_GET['my_orders'])){
                      include("my_orders.php");
                    
                    }
                     ?>
                    </div>
                    

          

          </div>
               <!-- footer section is here -->
          <div id="footer"><?php 
          include("footer.php"); ?></div>
     </div>

</body>
</html>