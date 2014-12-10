<?php
	session_start();
	$loginError = "";

	if (isset($_POST['signInSubmit'])) {
	   if (!empty($_POST)) {
	      $loginEmail = mysqli_real_escape_string($c, $_POST['signInEmail']);

	      $loginPW = mysqli_real_escape_string($c, $_POST['signInPassword']);

	      $loginQuery = "SELECT user_email, password
	      		    	FROM `ROFL.USERS`
				WHERE user_email='".$loginEmail."'";

	      $result = mysqli_query($c, $loginQuery);
	      $resultObj = $result->fetch_object();
	      $count = mysqli_num_rows($result);

	      if ($count == 1 && password_verify($loginPW, $resultObj->password)) {
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