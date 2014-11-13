<?php
	if (isset($_COOKIE['hidden1'])) {
	   $item1Hidden = $_COOKIE['hidden1'];
	   $item2Hidden = $_COOKIE['hidden2'];
	   $item3Hidden = $_COOKIE['hidden3'];
	   $item4Hidden = $_COOKIE['hidden4'];
	   setcookie("hidden1", "");
	   setcookie("hidden2", "");
	   setcookie("hidden3", "");
	   setcookie("hidden4", "");
	}

	if (isset($_COOKIE['hidden1t'])) {
	   $ticket1Hidden = $_COOKIE['hidden1t'];
	   $ticket2Hidden = $_COOKIE['hidden2t'];
	   $ticket3Hidden = $_COOKIE['hidden3t'];
	   $ticket4Hidden = $_COOKIE['hidden4t'];
	   $quantity = $_COOKIE['quan'];
	   setcookie("hidden1t", "");
	   setcookie("hidden2t", "");
	   setcookie("hidden3t", "");
	   setcookie("hidden4t", "");
	}
	else if (!$quantity) {
	   $quantity = 1;
	}

	$buyItemError="";
	$itemShippingAddress = $getUserResult->user_address_street;
	$itemShippingCity = $getUserResult->user_address_city;	
	$itemShippingState = $getUserResult->user_address_state;
	$itemShippingZip = $getUserResult->user_address_zip;
	$itemCardNum = $getUserResult->billing_card_number;
	$itemCardExp = strtotime($getUserResult->billing_card_exp_date);

	if ($itemCardExp != NULL) {
	   $itemCardExp = date('m',$itemCardExp).date('Y',$itemCardExp);
	}
	else {
	   $itemCardExp = "";  
	}

	$itemBillingAddress = $getUserResult->user_billing_address_street;
	$itemBillingCity = $getUserResult->user_billing_address_city;
	$itemBillingState = $getUserResult->user_billing_address_state;
	$itemBillingZip = $getUserResult->user_billing_address_zip;

	if(isset($_POST['secondItemButton'])) {
	  if (!empty($_POST)) {
	    $itemEmpty = false;

	    if (empty($_POST['shippingTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemShippingAddress = $_POST['shippingTB'];
	    }
	  
	    if (empty($_POST['shippingCTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemShippingCity = $_POST['shippingCTB'];
	    }
	    
	    
	    if (empty($_POST['shippingSTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemShippingState = $_POST['shippingSTB'];
	    }


	    if (empty($_POST['shippingZTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemShippingZip = $_POST['shippingZTB'];
	    }

	    
	    if (empty($_POST['cardNumTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemCardNum = $_POST['cardNumTB'];
	    }


	    if (empty($_POST['cardExpTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemCardExp = $_POST['cardExpTB'];
	    }


	    if (empty($_POST['billingTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemBillingAddress = $_POST['billingTB'];
	    }

	    if (empty($_POST['billingCTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemBillingCity = $_POST['billingCTB'];
	    }

	    if (empty($_POST['billingSTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemBillingState = $_POST['billingSTB'];
	    }

	    if (empty($_POST['billingZTB'])) {
	      	$itemEmpty = true;
	      	$buyItemError="Everything should be filled out";
	    }
	    else {
	    	$itemBillingZip = $_POST['billingZTB'];
	    }

	    $item1Hidden = "style=\"display:none;\"";
	    $item2Hidden = "style=\"display:inline;\"";

	    if ($itemEmpty == false) {
	       $itemShippingUpdate = "UPDATE `ROFL.USERS`
	       			     	     SET user_address_street='".$itemShippingAddress."',
					     	 user_address_city='".$itemShippingCity."',
						 user_address_state='".$itemShippingState."',
						 user_address_zip='".$itemShippingZip."',
						 billing_card_number='".$itemCardNum."',
						 billing_card_exp_date=STR_TO_DATE('".$itemCardExp."01','%m/%Y%d'),
						 user_billing_address_street='".$itemBillingAddress."',
						 user_billing_address_city='".$itemBillingCity."',
						 user_billing_address_state='".$itemBillingState."',
						 user_billing_address_zip='".$itemBillingZip."'
					WHERE user_email='".$cuser."'";
		if (!mysqli_query ($c, $itemShippingUpdate)) {
		   echo "Failed to update shipping info.";
		   exit;
		}
			 
		setcookie('hidden1', "style=\"display:none;\"", time()+50);
		setcookie('hidden2', "style=\"display:none;\"", time()+50);
		setcookie('hidden3', "style=\"display:inline;\"", time()+50);
		header("refresh:0;");
	    }
	  }
	}


	if(isset($_POST['submitItem'])) {
	  if (!empty($_POST)) {
	     $itemSubmitError == false;
	     $findQuery = "SELECT user_email
	     		  	  FROM `ROFL.BUY_ITEM`
				  WHERE user_email='".$cuser."'";	  
	     
	     $findResult = mysqli_query($c, $findQuery);
	     $count = mysqli_num_rows($findResult);
	     
	     if ($count == 1) {
	     	$itemSubmitError = true;
		$buyItemError="<font size=\"24\">You are buying too much!</font>";
	     }	     

	     mysqli_free_result($findResult);

	     if ($itemSubmitError == false) {
	     	$submitItemQuery = "INSERT INTO `ROFL.BUY_ITEM`
				   	   ( `user_email`, 
					     `item_id`
					   )
					   VALUES ( 
					   '".$cuser."',
					   '".$buyItemResult->item_id."')";
	       if (!mysqli_query($c, $submitItemQuery)) {
	       	  echo "Failed to buy item for customer.";
		  exit;
	       }

	       $item1Hidden = "style=\"display:none;\"";
	       $item2Hidden = "style=\"display:none;\"";
	       $item3Hidden = "style=\"display:none;\"";	
	       $item4Hidden = "style=\"display:inline;\"";

	       mail($cuser, "ROFL: Thank You For Your Purchase!", "<html>Hello ".$getUserResult->first_name.",<br><br>Thank you for your purchase of <b>".$buyItemResult->item_name."</b>.<br><br>Total Cost: <b>$".$buyItemResult->item_cost."</b><br><br>Thank you for shopping with us,<br>ROFL Team</html>","From: donotreply@rofl.com\r\nMIME-Version:1.0\r\nContent-type:text/html;charset=UTF-8"); 
	       header("Refresh:10; url=buyThings.php#buyItem");    	
	     }
	  }
	}

	$buyTicketError="";
	$ticketShippingAddress = $getUserResult->user_address_street;
	$ticketShippingCity = $getUserResult->user_address_city;	
	$ticketShippingState = $getUserResult->user_address_state;
	$ticketShippingZip = $getUserResult->user_address_zip;
	$ticketCardNum = $getUserResult->billing_card_number;
	$ticketCardExp = strtotime($getUserResult->billing_card_exp_date);
	
	if ($ticketCardExp != NULL) {
	   $ticketCardExp = date('m',$ticketCardExp).date('Y',$ticketCardExp);
	}
	else {
	   $ticketCardExp = "";  
	}

	$ticketBillingAddress = $getUserResult->user_billing_address_street;
	$ticketBillingCity = $getUserResult->user_billing_address_city;
	$ticketBillingState = $getUserResult->user_billing_address_state;
	$ticketBillingZip = $getUserResult->user_billing_address_zip;

	if (isset($_POST['secondTicketButton'])) {
	   if (!empty($_POST)) {
	      $ticketEmpty = false;


	    if (empty($_POST['shippingTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketShippingAddress = $_POST['shippingTBt'];
	    }
	  
	    if (empty($_POST['shippingCTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketShippingCity = $_POST['shippingCTBt'];
	    }
	    
	    
	    if (empty($_POST['shippingSTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketShippingState = $_POST['shippingSTBt'];
	    }


	    if (empty($_POST['shippingZTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketShippingZip = $_POST['shippingZTBt'];
	    }

	    
	    if (empty($_POST['cardNumTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketCardNum = $_POST['cardNumTBt'];
	    }


	    if (empty($_POST['cardExpTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketCardExp = $_POST['cardExpTBt'];
	    }


	    if (empty($_POST['billingTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketBillingAddress = $_POST['billingTBt'];
	    }

	    if (empty($_POST['billingCTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketBillingCity = $_POST['billingCTBt'];
	    }

	    if (empty($_POST['billingSTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketBillingState = $_POST['billingSTBt'];
	    }

	    if (empty($_POST['billingZTBt'])) {
	      	$ticketEmpty = true;
	      	$buyTicketError="Everything should be filled out";
	    }
	    else {
	    	$ticketBillingZip = $_POST['billingZTBt'];
	    }

	    if (empty($_POST['quantityt'])) {
	       $quantity = "1";
	    }
	    else {
	    	setcookie('quan', $_POST['quantityt']);
	    }

	    $ticket1Hidden = "style=\"display:none;\"";
	    $ticket2Hidden = "style=\"display:inline;\"";

	    if($ticketEmpty == false) {
	    	$ticketShippingUpdate = "UPDATE `ROFL.USERS`
	       			     	     SET user_address_street='".$ticketShippingAddress."',
					     	 user_address_city='".$ticketShippingCity."',
						 user_address_state='".$ticketShippingState."',
						 user_address_zip='".$ticketShippingZip."',
						 billing_card_number='".$ticketCardNum."',
						 billing_card_exp_date=STR_TO_DATE('".$ticketCardExp."01','%m/%Y%d'),
						 user_billing_address_street='".$ticketBillingAddress."',
						 user_billing_address_city='".$ticketBillingCity."',
						 user_billing_address_state='".$ticketBillingState."',
						 user_billing_address_zip='".$ticketBillingZip."'
					WHERE user_email='".$cuser."'";
	    	if (!mysqli_query ($c, $ticketShippingUpdate)) {
		   echo "Failed to update shipping info.";
		   exit;
		}

	    	setcookie('hidden1t', "style=\"display:none;\"", time()+50);
		setcookie('hidden2t', "style=\"display:none;\"", time()+50);
		setcookie('hidden3t', "style=\"display:inline;\"", time()+50);
		header("refresh:0;");
	    }
	  }
	}

	if (isset($_POST['submitTicket'])) {
	   if (!empty($_POST)) {
	      $quantity = $_COOKIE['quan'];
	      
	      mysqli_query($c, "BEGIN");

	      for ($x = 0; $x < $quantity; $x++) {
	      	  $submitTicketQuery = "INSERT INTO `ROFL.TICKET`
		  		       	       (`user_email`,
						`item_id`
						)
						VALUES (
						'".$cuser."',
						'".$buyItemResult->item_id."'
						)";
		  if (!mysqli_query($c, $submitTicketQuery)) {
		     echo "Failed to buy ticket for customer.";
		     mysqli_query($c, "ROLLBACK");
		     exit;
		  }
	       }
	      
	       mysqli_query($c, "COMMIT");

	       $ticket1Hidden = "style=\"display:none;\"";
	       $ticket2Hidden = "style=\"display:none;\"";
	       $ticket3Hidden = "style=\"display:none;\"";	
	       $ticket4Hidden = "style=\"display:inline;\"";

	       $ticket = "Ticket number(s) ordered for item:<br>";
	       $ticketQuery = "SELECT raffle_number
	       		      	      FROM `ROFL.TICKET`
				      WHERE user_email='".$cuser."'
				      AND item_id='".$buyItemResult->item_id."'";
		
	       $ticketSQL = $c->query($ticketQuery);

	       if ($ticketSQL) {
	       	  while ($row = $ticketSQL->fetch_object()) {
	       	     $ticket .= $row->raffle_number."<br>";
	       	  }
	       }

	       mysqli_free_result($ticketSQL);

	       mail($cuser, "ROFL: Thank You For Your Purchase!", "<html>Hello ".$getUserResult->first_name.",<br><br>Thank you for your purchase of tickets for <b>".$buyItemResult->item_name."</b>.<br><br>Total Cost: <b>$".(float)$buyItemResult->cost_of_ticket*(int)$quantity."</b><br><br>".$ticket."<br><br>Thank you for shopping with us,<br>ROFL Team</html>","From: donotreply@rofl.com\r\nMIME-Version:1.0\r\nContent-type:text/html;charset=UTF-8");     	
	       header("Refresh:10; url=buyThings.php#buyTicket");
	      }
	  } 
?>
