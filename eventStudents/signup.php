<?php
    session_start();
    require('./php/handleSignup.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/signup.css">

<body>
    <?php include('errors.php'); ?>
     <form action="signup.php" style="solid #ccc;margin-top: 200px;margin-right: 200px;margin-left: 200px;margin-bottom: 200px;" enctype="multipart/form-data" method = "POST">
     <div class="container">
       <h1>Create an Account</h1>
       <p>Please fill out this form so you can have access to all our amazing features.</p>
       <hr>
   
       <h4>Enter Matric Number </h4>
        <input type="text" name="matric" id="matric" maxlength="7" placeholder="XX/XXXX">

       <label for="firstnam"><b>First Name</b></label>
       <input type="text" placeholder="Enter First Name" name="firstnam" required>

       <label for="lastnam"><b>Last Name</b></label>
       <input type="text" placeholder="Enter Last Name" name="lastnam" required>

       <label for="dept"><b>Department</b></label>
       <select name="dept_ID" id="d_ID" >
          <option value="default">Select your Department</option>
          <?php
                   $d_ID = @mysqli_query($dbc,"SELECT `d_ID`, `d_Name` FROM t_departments");
                   if($d_ID)
                   {
                       while($row =  mysqli_fetch_array($d_ID))
                       {
                           echo '<option value = "'.$row['d_ID'].'">'.$row['d_Name'].'</option>';
                       }
                   }else{
                       echo"cannot get list of departments right now";
                   }
            ?>

       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" required>
   
       <label for="pswrepeat"><b>Repeat Password</b></label>
       <input type="password" placeholder="Repeat Password" name="pswrepeat" required>
   
       <label>
         <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
       </label>
   
       <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

       <p>Already a member? <a href="login.php" style="color:dodgerblue">Login</a>.</p>
       <div class="clearfix">
       <a href = "../index.html"><button type="button" class="cancelbtn">Cancel</button></a>
         <button type="submit" class="signupbtn" name ='reg_user'>Sign Up</button>
       </div>
     </div>
   </form> 
</body>




