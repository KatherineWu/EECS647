<?php
	session_start();
	$error = false;
	$fnameError=$repwError=$pwError=$emailError="";	
	      echo "test0\n";
	  /*    if (empty($_POST['firstName'])) {
	         $fnameError = "*required";
		 $error = true;
	      }
	      else {
	      }
*/
	      $loginFname = $_POST['firstName'];
	      echo "test1\n";
	      $loginLname = $_POST['lastName'];
	      $loginEmail = $_SESSION['user'];

 	      echo "test2\n";
	      if ($error == false) {
	      echo "test3\n";
	      
	      	 $signupQuery = "UPDATE `ROFL.USERS` SET `user_email`='".$loginEmail."',`user_address_street`='".$_POST['shippingStreet']."',`user_address_city`='".$_POST['shippingCity']."',`user_address_state`='".$_POST['shippingState']."',`user_address_zip`='".$_POST['shippingZip']."',`billing_card_number`='".$_POST['cardNumber']."',`billing_card_exp_date`='".$_POST['cardExpDate']."',`user_billing_address_street`='".$_POST['billingStreet']."',`user_billing_address_city`='".$_POST['billingCity']."',`user_billing_address_state`='".$_POST['billingState']."',`user_billing_address_zip`='".$_POST['billingZip']."',`user_phone`='".$_POST['phoneNumber']."',`first_name`='".$loginFname."',`last_name`='".$loginLname."' WHERE `user_email` = '".$loginEmail."'";
		if (!mysqli_query($c, $signupQuery)) {
		  echo "Failed to insert user.";
		  exit;
		}
		$_SESSION['user'] = $loginEmail;
		mysqli_close($c); 
		header("location: ../index.php#signIn");					  
	      }
?>

