<div id="accountSettings" style="text-align:center;">
     <h1><font size="6pt">Account Information</font></h1>

<?php
	include('db_access.php');

	include('settingsValidate.php');
?>
			<form name="accountForm" action="index.php#signIn" method="POST">
				First Name: <br>
				<input type="text" name="firstName" value="<?php echo $first_name;?>">
				<br>
				Last Name: <br>
				<input type="text" name="lastName" value="<?php echo $last_name?>">
				<br>
				Phone Number: <br>
				<input type="text" name="phoneNumber" value="<?php echo $phone?>">
				<br>
				Shipping Address:<br>
				<input type="text" name="shippingStreet" value="<?php echo $shippingStreet?>" placeholder="Street Address"><br>
				<input type="text" name="shippingCity" value="<?php echo $shippingCity?>" placeholder="City"><br>
				<input type="text" name="shippingState" value="<?php echo $shippingState?>" placeholder="State"><br>
				<input type="text" name="shippingZip" value="<?php echo $shippingZip?>" placeholder="Zip"><br>
				Billing Address:<br>
				<input type="text" name="billingStreet" value="<?php echo $billingStreet?>" placeholder="Street Address"><br>
				<input type="text" name="billingCity" value="<?php echo $billingCity?>" placeholder="City"><br>
				<input type="text" name="billingState" value="<?php echo $billingState?>" placeholder="State"><br>
				<input type="text" name="billingZip" value="<?php echo $billingZip?>" placeholder="Zip"><br>
				Card Information:<br>
				<input type="text" name="cardNumber" value="<?php echo $cardNumber?>" placeholder="Card Number"><br>
				<input type="text" name="cardExpDate" value="<?php echo $cardExpDate?>" placeholder="Card Expiration Date"><br>
				<div style="display:none;"><input type="text" name="email" value="<?php echo $user_email?>"></div>
				<br><br>
				<input type="submit" id="accountSubmit" name="accountSubmit" value="Submit">
			</form>

</div>
