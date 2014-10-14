<?php
	session_start();
	$loginError = "";	

	if (isset($_POST['signInSubmit'])) {
	   if (!empty($_POST)) {
	      $loginEmail = mysqli_real_escape_string($c, $_POST['signInEmail']);
	      $loginPW = mysqli_real_escape_string($c, $_POST['signInPassword']);

	      $loginQuery = "SELECT email
	      		    	FROM USER
				WHERE email='".$loginEmail."'
				      AND password='".$loginPW."'";

	      $result = mysqli_query($c, $loginQuery);
	      $count = mysqli_num_rows($result);

	      if ($count == 1) {
	      	 $loginError = "";
	      	 $_SESSION['user'] = $loginEmail;
		 header("location: ./index.php#signIn");
		 mysqli_close($c);
	      }
	      else {
	      	 $loginError = "Wrong email or password.";
	      }	      
	   }   
	}		
?>