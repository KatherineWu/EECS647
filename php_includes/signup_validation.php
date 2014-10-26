<?php
	session_start();
	$fnameError=$repwError=$pwError=$emailError="";	

	if (isset($_POST['signUpSubmit'])) {
	   if (!empty($_POST)) {
	      $error = false;

	      if (empty($_POST['signInEmail'])) {
	      	 $emailError = "*required";
		 $error = true;
	      }
	      else {
	      	 $loginEmail = $_POST['signInEmail'];
		 if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
		    $emailError = "*invalid";
		    $error = true;
		 }
		 else {
		   $findQuery = "SELECT user_email
		   	      	 FROM `ROFL.USERS`
				 WHERE user_email='".$loginEmail."'";

		   $result = mysqli_query($c, $findQuery);
		   $count = mysqli_num_rows($result);

		   if ($count == 1) {
		     $emailError = "*email already exists";
		     $error = true;
		   }
		 }
	      }
	      
	      if (empty($_POST['signUpFName'])) {
	         $fnameError = "*required";
		 $error = true;
	      }
	      else {
	         $loginFname = $_POST['signUpFName'];
	      }

	      $loginLname = $_POST['signUpLName'];

	      if (empty($_POST['signInPassword'])) {
	         $pwError = "*required";
		 $error = true;
	      } 
	      else if ($_POST['signInPassword'] != $_POST['signInPasswordRe']) {
	         $pwError = "*passwords don't match";
		 $error = true;
	      } 
	      else {
	      	 $loginPW = $_POST['signInPassword'];
	      }
 
	      if ($error == false) {
	      	 $signupQuery = "INSERT INTO `csoden42`.`ROFL.USERS` 
		 	      		(`user_email`, 
					 `password`, 
					 `user_address_street`, 
					 `user_address_city`, 
					 `user_address_state`, 
					 `billing_card_number`, 
					 `billing_card_exp_date`, 
					 `user_billing_address_street`, 
					 `user_billing_address_city`, 
					 `user_billing_address_state`, 
					 `user_phone`, 
					 `first_name`, 
					 `last_name`
					 )
				 VALUES ( '".$loginEmail."',
				 	  '".$loginPW."',
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL, 
					  NULL,
					  '".$loginFname."',
					  '".$loginLname."'
					  )";

		if (!mysqli_query($c, $signupQuery)) {
		  echo "Failed to insert user.";
		  exit;
		}

		$_SESSION['user'] = $loginEmail;
		mysqli_close($c);
		header("location: ./index.php#signIn");					  
	      }
	   }
	}
?>