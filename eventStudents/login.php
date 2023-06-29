<?php
    session_start();
    require_once('./php/handleLogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php include('errors.php'); ?> 
    <form class="login-box" action="login.php" method="post">
        <h4>Enter Matric Number </h4>
        <input type="text" name="matric" id="matric" maxlength="7" placeholder="XX/XXXX">

        <h4 style="margin-left: auto;margin-right: auto;margin-bottom: 7px;margin-top: 20px;" for="psw">Password</h4>
       <input type="password" placeholder="Enter Password" name="psw">

        <input type="submit" name="submit" value="Proceed">  
        
       

        <h4 style="margin-top: 40px;">
  		    Don't have an account yet?<a href="signup.php">Sign up</a>
        </h4>
    </form>    
</body>
</html>