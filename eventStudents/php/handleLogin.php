<?php  
    require_once('connect.php');

    //$_SESSION['matric'] = ""; //Initialize Session    
    //$_SESSION['psw'] = "";
    $errors = array(); //Initialize Error Message

    $matric = isset($_POST['matric']) ? mysqli_real_escape_string($dbc, $_POST['matric']) : '';
    $psw = isset($_POST['psw']) ?  mysqli_real_escape_string($dbc, $_POST['psw']) : '';

  if (empty($matric)) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($psw)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0)
   {
  	 //$psw = md5($psw);
  	$query = "SELECT * FROM t_students WHERE `s_Matric` ='$matric' AND `s_Password` ='$psw'";
  	$results = mysqli_query($dbc, $query);
    if (mysqli_num_rows($results) == 1) 
    {
  	  $_SESSION['matric'] = $matric;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: postEvent.php');
    }else 
    {
  		array_push($errors, "Wrong Matric/password combination");
  	}
  }

?>