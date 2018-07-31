<?php //for retrieving data from the database       
    include("admin_area/includes/db.php");
                 $user = $_SESSION['c_email'];
                       $get_customer = "select * from customers where customer_email = '$user'";
                       $run_customer= mysqli_query($con,$get_customer);
                       $row_customer = mysqli_fetch_array($run_customer);
                       $c_id = $row_customer['customer_id'];
                       $name = $row_customer['customer_name'];
                       $email = $row_customer['customer_email'];
                       $pass = $row_customer['customer_pass'];
                       $phone = $row_customer['customer_contact'];
                      $division = $row_customer['customer_city'];
                       $address = $row_customer['customer_location'];
 ?>
 <form action="" method="post" enctype="multipart/form-data">
            <table width="950" border="5">
              <tr align="right">
                <td><strong><u>EDIT ACCOUNT</u></strong></td>
              </tr>

              <tr>
               <td align="right"> Full Name: </td>
               <td><input type="text" name="c_name" id="c_name" value="<?php echo $name;?>"></td>
            </tr>

            
            <tr>
            <td align="right">Email Address: </td>
            <td><input type="text" name="c_email" id="c_email" value="<?php echo $email;?>">  </td> 
             </tr>
             
             <tr>      
            <td align="right">Phone Number: </td>
            <td><input type="text" name="c_phone" id="c_phone" value="<?php echo $phone;?>"></td>
            </tr> 

            <tr>
            <td align="right">Division: </p></td>
              <td> <select name="c_city" id="c_city">
                <option><?php echo $division; ?></option>
              <option value="Dhaka">Dhaka</option>
              <option value="Barishal">Barishal</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Khulna">Khulna</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Comilla">Comilla</option>
              <option value="Rangpur">Rangpur</option>
              <option value="Mymensingh">Mymensingh</option>
            </select></td>
            </tr>
            
            <tr>
            <td align="right">Address: </td>
            <td><input type="text" name="c_loc" id="c_loc" value="<?php echo $address;?>" cols="40" rows="10"></td>
            </tr>

            <tr>
            <td align="right">Password</td>
           <td> <input type="text" name="c_password" id="c_password" value="<?php echo $pass;?>"" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters"></td>
            </tr>

           

            <tr>
              <td align="right"><input type="submit" name="update" value="update Account"></td>
            </tr>
            
            </table>
          </form>

     
         
     
<?php 
if(isset($_POST['update'])){
    $ip = getIp();
    $customer_id=$c_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phone = $_POST['c_phone'];
    $c_city = $_POST['c_city'];
    $c_loc = $_POST['c_loc'];
    $c_password = $_POST['c_password'];

  
//for updating the data of customer into database
    $update_c ="update customers set customer_name='$c_name',
    customer_email='$c_email', customer_location='$c_loc' , customer_city='$c_city' , customer_contact= '$c_phone', customer_pass='$c_password' where customer_ip='$ip'";
    $run_update = mysqli_query($con, $update_c);
  
    if($run_update){
      echo "<script>alert('Account updated')</script>";
      echo "<script>window.open('myaccount.php','_self')</script>";
    }
} 
?>
