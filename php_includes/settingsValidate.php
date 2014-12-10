<?php
	
	$loginEmail = $_SESSION['user'];
		 
	// get results from database
	$result = mysqli_query($c, "SELECT * FROM `ROFL.USERS`  WHERE user_email='".$loginEmail."'") 
	or die(mysqli_error());  
	while ($row = mysqli_fetch_array($result)) {
	      $first_name = $row['first_name'];
	      $last_name = $row['last_name'];
	      if ($row['user_phone'] == 0) {
	      	 $phone = ""; 
	      }
	      else {
	      	 $phone = $row['user_phone'];
	      }
	      $shippingStreet = $row['user_address_street'];
	      $shippingCity = $row['user_address_city'];
	      $shippingState = $row['user_address_state'];
	      if ($row['user_address_zip'] == 0) {
	      	 $shippingZip = ""; 
	      }
	      else {
	      	 $shippingZip = $row['user_address_zip'];
	      }
	      $cardNumber = $row['billing_card_number'];
	      if ($row['billing_card_exp_date'] == "0000-00-00") {
	      	 $cardExpDate = ""; 
	      }
	      else {
	      	 $cardExpDate = $row['billing_card_exp_date'];
	      }
	      $billingStreet = $row['user_billing_address_street'];
	      $billingCity = $row['user_billing_address_city'];
	      $billingState = $row['user_billing_address_state'];
	      if ($row['user_billing_address_zip'] == 0) {
	      	 $billingZip = ""; 
	      }
	      else {
	      	 $billingZip = $row['user_billing_address_zip'];
	      }	      
	}
	mysqli_free_result($result);

	if (isset($_POST['accountSubmit'])) {
		if (!empty($_POST)) {

		   $first_name = $_POST['firstName'];
		   $last_name = $_POST['lastName'];
		   $phone = $_POST['phoneNumber'];
		   $shippingStreet = $_POST['shippingStreet'];
		   $shippingCity = $_POST['shippingCity'];
		   $shippingState = $_POST['shippingState'];
		   $shippingZip = $_POST['shippingZip'];
		   $cardNumber = $_POST['cardNumber'];
		   $cardExpDate = $_POST['cardExpDate'];
		   $billingStreet = $_POST['billingStreet'];
		   $billingCity = $_POST['billingCity'];
		   $billingState = $_POST['billingState'];
		   $billingZip = $_POST['billingZip'];

		   $account_phone = "";
		   $accountUpdate = "UPDATE `ROFL.USERS` SET
		   		    	    first_name='".$first_name."',
					    last_name='".$last_name."',
					    user_phone='".$phone."',
					    user_address_street='".$shippingStreet."',
					    user_address_city='".$shippingCity."',
					    user_address_state='".$shippingState."',
					    user_address_zip='".$shippingZip."',
					    user_billing_address_street='".$billingStreet."',
					    user_billing_address_city='".$billingCity."',
					    user_billing_address_state='".$billingState."',
					    user_billing_address_zip='".$billingZip."',
					    billing_card_number='".$cardNumber."',
					    billing_card_exp_date='".$cardExpDate."'
				WHERE user_email='".$loginEmail."'";

				if (!mysqli_query ($c, $accountUpdate)) {
				echo "Failed to update account.";
				exit;
				}   
		}
	}

?>

