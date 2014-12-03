<?php include("account_query.php"); ?>
<div id="accountSettings">
     <h1><font size="6pt">Account Information</font></h1>

<?php

	include('db_access.php');

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

			// get results from database
			$result = mysql_query("SELECT * FROM `ROFL.USERS`  WHERE user_email='".$loginEmail."'") 
				or die(mysql_error());  
		
				while ($row = mysql_fetch_array($user_info)) {
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$phone = $row['user_phone'];
						$shippingStreet = $row['user_address_street'];
						$shippingCity = $row['user_address_city'];
						$shippingState = $row['user_address_state'];
						$shippingZip = $row['user_address_zip'];
						$cardNumber = $row['billing_card_number'];
						$cardExpDate = $row['billing_card_exp_date'];
						$billingStreet = $row['user_billing_address_street'];
						$billingCity = $row['user_billing_address_city'];
						$billingState = $row['user_billing_address_state'];
						$billingZip = $row['user_billing_address_zip'];
						$password = $row['password'];
					}

			?>

			<form action="settingsValidate.php">
				First name:
				<input type="text" name="firstName" value="<?php echo $first_name?>">
				<br>
				Last name:
				<input type="text" name="lastName" value="<?php echo $last_name?>">
				<br>
				Phone Number:
				<input type="text" name="phoneNumber" value="<?php echo $phone?>">
				<br>
				Shipping Address:<br>
				<input type="text" name="shippingStreet" value="<?php echo $shippingStreet?>"><br>
				<input type="text" name="shippingCity" value="<?php echo $shippingCity?>"><br>
				<input type="text" name="shippingState" value="<?php echo $shippingState?>"><br>
				<input type="text" name="shippingZip" value="<?php echo $shippingZip?>"><br>
				Billing Address:<br>
				<input type="text" name="billingStreet" value="<?php echo $billingStreet?>"><br>
				<input type="text" name="billingCity" value="<?php echo $billingCity?>"><br>
				<input type="text" name="billingState" value="<?php echo $billingState?>"><br>
				<input type="text" name="billingZip" value="<?php echo $billingZip?>"><br>
				Card Information:<br>
				<input type="password" name="cardNumber" value="<?php echo $cardNumber?>"><br>
				<input type="password" name="cardExpDate" value="<?php echo $cardExpDate?>"><br>
				Password:
				<input type="password" name="password" value="<?php echo $password?>">
				<div style="display:none;"><input type="text" name="email" value="<?php echo $user_email?>"></div>
				<br><br>
				<input type="submit" value="Submit">
			</form>

</div>

