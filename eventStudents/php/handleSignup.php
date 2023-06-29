<?php
   require_once('connect.php');
   //require_once('./php/handleSignup.php'); 
   $errors = array();

   // REGISTER USER
   if (isset($_POST['reg_user'])) {
     // receive all input values from the form
     $matric = mysqli_real_escape_string($dbc, $_POST['matric']);
     $firstnam = mysqli_real_escape_string($dbc, $_POST['firstnam']);
     $lastnam = mysqli_real_escape_string($dbc, $_POST['lastnam']);
     $psw = mysqli_real_escape_string($dbc, $_POST['psw']);
     $pswrepeat = mysqli_real_escape_string($dbc, $_POST['pswrepeat']);
     $dept_ID = isset($_POST['dept_ID']) ? mysqli_real_escape_string($dbc, $_POST['dept_ID']) : '';
   
     // form validation: ensure that the form is correctly filled ...
     // by adding (array_push()) corresponding error unto $errors array
     if (empty($matric)) { array_push($errors, "Matric Number is required"); }
     if (empty($firstnam)) { array_push($errors, "First Name is required"); }
     if (empty($lastnam)) { array_push($errors, "Last Name is required"); }
     if (empty($psw)) { array_push($errors, "Password is required" );}
     if (empty($pswrepeat)) { array_push($errors, "Confirmation Password is required" );}
     if ($psw != $pswrepeat) 
     {
             array_push($errors, "The two passwords do not match");
     }
   
     // first check the database to make sure 
     // a user does not already exist with the same username and/or matric number
     $user_check_query = "SELECT * FROM t_students WHERE s_Matric='$matric' OR s_Firstname='$firstnam' LIMIT 1";
     $result = mysqli_query($dbc, $user_check_query);
     $user = mysqli_fetch_assoc($result);
     
     if ($user) { // if user exists
       if ($user['s_Matric'] === $matric) {
         array_push($errors, "User already exists");
       }
   
     }
   
     // Finally, register user if there are no errors in the form
     if (count($errors) == 0) {
       //$psw = md5($psw);//encrypt the password before saving in the database
   
       $query = "INSERT INTO t_students(`s_ID`, `s_Firstname`, `s_Lastname`, `s_Matric`,`s_Password`,`d_ID`) 
                               VALUES (NULL, '$firstnam', '$lastnam', '$matric','$psw','$dept_ID')";
       mysqli_query($dbc, $query);
       $_SESSION['matric'] = $matric;
       $_SESSION['success'] = "You have successfully signed up.";
       header('location:login.php');
     }
   }
?>