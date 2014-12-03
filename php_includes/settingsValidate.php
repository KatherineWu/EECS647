<?php
	session_start();
	$fnameError=$repwError=$pwError=$emailError="";	
	   if (!empty($_POST)) {
	      $error = false;
	      if (empty($_POST['email'])) {
	      	 $emailError = "*required";
		 $error = true;
	      }
	      else {
	      	 $loginEmail = $_POST['email'];
		 if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
		    $emailError = "*invalid";
		    $error = true;
		 }
	      }
	      
	      if (empty($_POST['firstName'])) {
	         $fnameError = "*required";
		 $error = true;
	      }
	      else {
	         $loginFname = $_POST['firstName'];
	      }
	      $loginLname = $_POST['lastName'];
	      if (empty($_POST['password'])) {
	         $pwError = "*required";
		 $error = true;
	      }  
	      else {
	      	 $loginPW = $_POST['password'];
	      }
 
	      if ($error == false) {
	      	 $signupQuery = "UPDATE `ROFL.USERS` SET `user_email`=".$loginEmail.",`password`=".$loginPW.",`user_address_street`=".$_POST['shippingStreet'].",`user_address_city`=".$_POST['shippingCity'].",`user_address_state`=".$_POST['shippingState'].",`user_address_zip`=".$_POST['shippingZip'].",`billing_card_number`=".$_POST['cardNumber'].",`billing_card_exp_date`=".$_POST['cardExpDate'].",`user_billing_address_street`=".$_POST['billingStreet'].",`user_billing_address_city`=".$_POST['billingCity'].",`user_billing_address_state`=".$_POST['billingState'].",`user_billing_address_zip`=".$_POST['billingZip'].",`user_phone`=".$_POST['phoneNumber'].",`first_name`=".$loginFname.",`last_name`=".$loginLname." WHERE `user_email` = ".$loginEmail;
		if (!mysqli_query($c, $signupQuery)) {
		  echo "Failed to insert user.";
		  exit;
		}
		$_SESSION['user'] = $loginEmail;
		mysqli_close($c);
		header("location: ./index.php#signIn");					  
	      }
	   }
?>

