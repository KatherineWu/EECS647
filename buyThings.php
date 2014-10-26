<html>
<head>
<?php session_start(); 
      if(!isset($_SESSION['user'])) {
    	header("location: index.php");
      }
      else {
        $cuser = $_SESSION['user'];
      }
?>
<?php include("php_includes/db_access.php"); ?>
<?php include("php_includes/header.php"); ?>
<?php include("php_includes/buyMenuBar.php"); ?>
<?php include("php_includes/get_item.php"); ?>
<?php include("php_includes/get_user_info.php"); ?>
<?php include("php_includes/shipping.php"); ?>

<title>Buy things!</title>
</head>
<body onload="screenheight();">
	<div id="buyItemWrapper" class="mainWrapper">
	     <section id="buyItem" class="mainContent">
	     	      <br><br><br><br><br>
		      <div id="buyItemBody" class="buyContent">
			<h2><?php echo $buyItemResult->item_name; ?> ($<?php echo $buyItemResult->item_cost; ?>)</h2>
			<div id="firstBuyItem" <?php echo $item1Hidden; ?>>
			  <div class="itemImg">
			    <img style="max-width:450px;max-height:325px;" src="<?php echo $pathToItemPic; ?>">
			  </div>
		          <div class="itemDescr">
			    <?php echo $buyItemResult->item_description; ?>
			  </div>
			  <input type="button" id="buyItemBtn" name="buyItemBtn" value="Buy Item!" onclick="showHide('#paymentShippingItem','#firstBuyItem');">
			  <br><br>one per customer
			</div>
			<div id="paymentShippingItem" class="hiddenDisplay" <?php echo $item2Hidden; ?>>
			  <form name="itemShippingForm"  action="#buyItem" method="POST">
			  <div id="shippingAddress">
			    <h3>Shipping Address</h3>
			    <table id="shippingInfo" class="paymentTable">
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_address_street != NULL) {
		      		     echo "<td>Street Address:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_address_street == NULL) {
			      	       echo "Shipping address was not stored.";
				     }
				     else {
			      	       echo $getUserResult->user_address_street; 
				     }
				     ?>
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_address_street != NULL) { 
		      		     echo "<td>City:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_address_street != NULL)
				       echo $getUserResult->user_address_city; ?>
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_address_street != NULL) {
		      		     echo "<td>State:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_address_street != NULL)
				       echo $getUserResult->user_address_state; ?>	
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_address_street != NULL) {
		      		     echo "<td>Zip:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_address_street != NULL)
				       echo $getUserResult->user_address_zip; ?>	
				</td>
			      </tr>
			      <tr>
				<td>     
				  <br>	    
	    			  <a href="#" onclick="showHide('#shippingForm','#shippingInfo')" class="editButton">edit</a>
				</td>
			      </tr>
			    </table>
			    <table id="shippingForm" class="paymentTable hiddenDisplay">
     			      <tr>
				<td>
				  <input type="text" id="shippingTB" name="shippingTB" placeholder="Shipping Address" value="<?php echo htmlspecialchars($itemShippingAddress) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="shippingCTB" name="shippingCTB" placeholder="Shipping City" value="<?php echo htmlspecialchars($itemShippingCity) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="shippingSTB" name="shippingSTB" placeholder="Shipping State" value="<?php echo htmlspecialchars($itemShippingState) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="shippingZTB" name="shippingZTB" placeholder="Shipping Zip" value="<?php echo htmlspecialchars($itemShippingZip) ?>" maxlength="5">
				</td>
			      </tr>
			    </table>
			  </div>
			  <div id="payment">
			    <h3>Credit/Debit</h3>
			    <table id="paymentInfo" class="paymentTable">
     			      <tr>
				<?php 	     
				   if ($getUserResult->billing_card_number != NULL) {
		      		     echo "<td>Card Number:</td>";
				   }
				   ?>
				<td>	
				  <?php 
				     
				     if ($getUserResult->billing_card_number == NULL) {
			      	       echo "No card was stored.";
				     }
				     else {
			      	       echo $getUserResult->billing_card_number; 
				     }
				     ?>
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->billing_card_number != NULL) {
		      		     echo "<td>Card Exp:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->billing_card_number != NULL) {
				       $exp_date = strtotime($getUserResult->billing_card_exp_date);
				       $exp_date = date('m',$exp_date)."/".date('Y',$exp_date);
				       echo $exp_date;
				     }
				     ?>
				</td>
			      </tr>
			      <tr>
				<td>     	    
				  <br>
	    			  <a href="#" onclick="showHide('#paymentForm','#paymentInfo')" class="editButton">edit</a>
				</td>
			      </tr>
			    </table>
			    <table id="paymentForm" class="paymentTable hiddenDisplay">
			      <tr>
				<td>
				  <input type="text" id="cardNumTB" name="cardNumTB" placeholder="Card Number" value="<?php echo htmlspecialchars($itemCardNum) ?>"  maxlength="19">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="cardExpTB" name="cardExpTB" placeholder="Card Exp MM/YYYY" value="<?php echo htmlspecialchars($itemCardExp) ?>">
				</td>
			      </tr>
			    </table>
			  </div>
			  <div id="billingAddress">
			    <h3>Billing Address</h3>
			    <table id="billingInfo" class="paymentTable">
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_billing_address_street != NULL) {
		      		     echo "<td>Billing Address:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_billing_address_street == NULL) {
			      	       echo "Billing address was not stored.";
				     }
				     else {
			      	       echo $getUserResult->user_billing_address_street; 
				     }
				     ?>
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_billing_address_street != NULL) {
		      		     echo "<td>Billing City:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_billing_address_street != NULL)
				       echo $getUserResult->user_billing_address_city; ?>
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_billing_address_street != NULL) {
		      		     echo "<td>Billing State:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_billing_address_street != NULL)
				       echo $getUserResult->user_billing_address_state; ?>	
				</td>
			      </tr>
     			      <tr>
				<?php 	     
				   if ($getUserResult->user_billing_address_street != NULL) {
		      		     echo "<td>Billing Zip:</td>";
				   }
				   ?>
				<td>
				  <?php 
				     if ($getUserResult->user_billing_address_street != NULL)
				       echo $getUserResult->user_billing_address_zip; ?>
				</td>
			      </tr>
			      <tr>
				<td>     
				  <br>	    
	    			  <a href="#" onclick="showHide('#billingForm','#billingInfo')" class="editButton">edit</a>
				</td>
			      </tr>
			    </table>
			    <table id="billingForm" class="paymentTable hiddenDisplay">
     			      <tr>
				<td>
				  <input type="text" id="billingTB" name="billingTB" placeholder="Billing Address" value="<?php echo htmlspecialchars($itemBillingAddress) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="billingCTB" name="billingCTB" placeholder="Billing City" value="<?php echo htmlspecialchars($itemBillingCity) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="billingSTB" name="billingSTB" placeholder="Billing State" value="<?php echo htmlspecialchars($itemBillingState) ?>">
				</td>
			      </tr>
			      <tr>
				<td>
				  <input type="text" id="billingZTB" name="billingZTB" placeholder="Billing Zip" value="<?php echo htmlspecialchars($itemBillingZip) ?>" maxlength="5">
				</td>
			      </tr>
			    </table>
			    <br><br>
			    <input type="submit" id="secondItemButton" name="secondItemButton" value="Next">
			  </div>
			</form>
			</div>
		      <?php echo $buyItemError;  ?>
		      <div id="thirdBuyItem" class="hiddenDisplay" <?php echo $item3Hidden; ?>>
			<div id="itemTotal">
			  <h3>Total Cost:</h3>
			  <b>$<?php echo $buyItemResult->item_cost; ?></b><br>
			  Free shipping and handling! No tax!
			</div>
			<div id="thirdItemShipping">
			  <h3>Shipped to:</h3>
			  <table>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_street; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_city; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_state; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_zip; ?>
			      </td>
			    </tr>

			  </table>
			</div>
			<div id="thirdItemCard">
			  <h3>Payment:</h3>
			  <table>
			    <tr>
			      <td>
				<?php echo "...-".substr($getUserResult->billing_card_number,-4); ?>
			      </td>
			    </tr>
			  </table>
			</div> <br><br><br>
			<input type="button" id="itemPrev" name="itemPrev" value="Previous" onclick="showHide('#paymentShippingItem','#thirdBuyItem');">
			<form name="itemConfirmForm"  action="#buyItem" method="POST">
			  <input type="submit" id="submitItem" name="submitItem" value="Submit">
			</form>
		      </div>
		      <div id="itemConfirmation" class="hiddenDisplay" <?php echo $item4Hidden; ?>>
			<font size="14">Thank you for your purchase!</font><br>
			An email has been sent to you about this purchase<br>
			Page will redirect to homepage in 5 seconds.
		      </div>
		      </div>
	     </section>
	</div>
	<br>
	<div id="buyTicketWrapper" class="mainWrapper">
	     <section id="buyTicket" class="mainContent">
	     	      <br><br><br><br><br>
		      <div id="buyTicketBody" class="buyContent">
			<div id="firstBuyTicket" <?php echo $ticket1Hidden;  ?>>
			  <font size="10pt">
			    <h2>ROFL TICKETS!</h2>
			    <h3>How does this work?</h3><br>
			  </font>
			  <font size="5pt">
			    Buy tickets for a flat price of $<?php echo $buyItemResult->cost_of_ticket; ?> with no shipping or handling cost. <br>
			    Each ticket will have an unique number to it.<br>
			    At the end of the day, a ticket drawing will take place. <br>
			    The person holding the winning ticket number will be notified through email and the item will be shipped to the winner for free!<br><br><br></font>
			  <input type="button" id="buyItemBtn" name="buyItemBtn" value="Buy Ticket Now!" onclick="showHide('#secondBuyTicket','#firstBuyTicket');">
			</div>
			<div id="secondBuyTicket" class="hiddenDisplay" <?php echo $ticket2Hidden;  ?>>
			  <form name="ticketShippingForm"  action="#buyTicket" method="POST">
			    <div id="shippingAddresst">
			      <h3>Shipping Address</h3>
			      <table id="shippingInfot" class="paymentTable">
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_address_street != NULL) {
		      		  echo "<td>Street Address:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_address_street == NULL) {
			      	    echo "Shipping address was not stored.";
				    }
				    else {
			      	    echo $getUserResult->user_address_street; 
				    }
				    ?>
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_address_street != NULL) { 
		      		  echo "<td>City:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_address_street != NULL)
				    echo $getUserResult->user_address_city; ?>
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_address_street != NULL) {
		      		  echo "<td>State:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_address_street != NULL)
				    echo $getUserResult->user_address_state; ?>	
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_address_street != NULL) {
		      		  echo "<td>Zip:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_address_street != NULL)
				    echo $getUserResult->user_address_zip; ?>	
				  </td>
				</tr>
				<tr>
				  <td>     
				    <br>	    
	    			    <a href="#buyTicket" onclick="showHide('#shippingFormt','#shippingInfot')" class="editButton">edit</a>
				  </td>
				</tr>
			      </table>
			      <table id="shippingFormt" class="paymentTable hiddenDisplay">
     				<tr>
				  <td>
				    <input type="text" id="shippingTBt" name="shippingTBt" placeholder="Shipping Address" value="<?php echo htmlspecialchars($ticketShippingAddress) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="shippingCTBt" name="shippingCTBt" placeholder="Shipping City" value="<?php echo htmlspecialchars($ticketShippingCity) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="shippingSTBt" name="shippingSTBt" placeholder="Shipping State" value="<?php echo htmlspecialchars($ticketShippingState) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="shippingZTBt" name="shippingZTBt" placeholder="Shipping Zip" value="<?php echo htmlspecialchars($ticketShippingZip) ?>" maxlength="5">
				  </td>
				</tr>
			      </table>
			    </div>
			    <div id="paymentt">
			      <h3>Credit/Debit</h3>
			      <table id="paymentInfot" class="paymentTable">
     				<tr>
				  <?php 	     
				     if ($getUserResult->billing_card_number != NULL) {
		      		  echo "<td>Card Number:</td>";
				  }
				  ?>
				  <td>	
				    <?php 
				       
				       if ($getUserResult->billing_card_number == NULL) {
			      	    echo "No card was stored.";
				    }
				    else {
			      	    echo $getUserResult->billing_card_number; 
				    }
				    ?>
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->billing_card_number != NULL) {
		      		  echo "<td>Card Exp:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->billing_card_number != NULL) {
				    $exp_date = strtotime($getUserResult->billing_card_exp_date);
				    $exp_date = date('m',$exp_date)."/".date('Y',$exp_date);
				    echo $exp_date;
				    }
				    ?>
				  </td>
				</tr>
				<tr>
				  <td>     	    
				    <br>
	    			    <a href="#buyTicket" onclick="showHide('#paymentFormt','#paymentInfot')" class="editButton">edit</a>
				  </td>
				</tr>
			      </table>
			      <table id="paymentFormt" class="paymentTable hiddenDisplay">
				<tr>
				  <td>
				    <input type="text" id="cardNumTBt" name="cardNumTBt" placeholder="Card Number" value="<?php echo htmlspecialchars($ticketCardNum) ?>"  maxlength="19">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="cardExpTBt" name="cardExpTBt" placeholder="Card Exp MM/YYYY" value="<?php echo htmlspecialchars($ticketCardExp) ?>">
				  </td>
				</tr>
			      </table>
			    </div>
			    <div id="billingAddresst">
			      <h3>Billing Address</h3>
			      <table id="billingInfot" class="paymentTable">
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_billing_address_street != NULL) {
		      		  echo "<td>Billing Address:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_billing_address_street == NULL) {
			      	    echo "Billing address was not stored.";
				    }
				    else {
			      	    echo $getUserResult->user_billing_address_street; 
				    }
				    ?>
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_billing_address_street != NULL) {
		      		  echo "<td>Billing City:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_billing_address_street != NULL)
				    echo $getUserResult->user_billing_address_city; ?>
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_billing_address_street != NULL) {
		      		  echo "<td>Billing State:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_billing_address_street != NULL)
				    echo $getUserResult->user_billing_address_state; ?>	
				  </td>
				</tr>
     				<tr>
				  <?php 	     
				     if ($getUserResult->user_billing_address_street != NULL) {
		      		  echo "<td>Billing Zip:</td>";
				  }
				  ?>
				  <td>
				    <?php 
				       if ($getUserResult->user_billing_address_street != NULL)
				    echo $getUserResult->user_billing_address_zip; ?>
				  </td>
				</tr>
				<tr>
				  <td>     
				    <br>	    
	    			    <a href="#buyTicket" onclick="showHide('#billingFormt','#billingInfot')" class="editButton">edit</a>
				  </td>
				</tr>
			      </table>
			      <table id="billingFormt" class="paymentTable hiddenDisplay">
     				<tr>
				  <td>
				    <input type="text" id="billingTBt" name="billingTBt" placeholder="Billing Address" value="<?php echo htmlspecialchars($ticketBillingAddress) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="billingCTBt" name="billingCTBt" placeholder="Billing City" value="<?php echo htmlspecialchars($ticketBillingCity) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="billingSTBt" name="billingSTBt" placeholder="Billing State" value="<?php echo htmlspecialchars($ticketBillingState) ?>">
				  </td>
				</tr>
				<tr>
				  <td>
				    <input type="text" id="billingZTBt" name="billingZTBt" placeholder="Billing Zip" value="<?php echo htmlspecialchars($ticketBillingZip) ?>" maxlength="5">
				  </td>
				</tr>
			      </table>
			      <br><br> 
			      Quantity: <input type="text" id="quantityt" name="quantityt" value="<?php echo htmlspecialchars($quantity); ?>" maxlength="3" size="1"><br><br>
			      <input type="submit" id="secondTicketButton" name="secondTicketButton" value="Next">
			    </div>
			  </form>
			  <?php echo $buyTicketError;  ?>
			</div>
			<div id="thirdBuyTicket" class="hiddenDisplay" <?php echo $ticket3Hidden; ?>>
			  			<div id="itemTotal">
			  <h3>Total Cost:</h3>
			  <b>$<?php echo (int)$quantity*(float)$buyItemResult->cost_of_ticket; ?></b><br>
			  Free shipping and handling! No tax!
			</div>
			<div id="thirdItemShipping">
			  <h3>Shipped to:</h3>
			  <table>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_street; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_city; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_state; ?>
			      </td>
			    </tr>
			    <tr>
			      <td>
				<?php echo $getUserResult->user_address_zip; ?>
			      </td>
			    </tr>

			  </table>
			</div>
			<div id="thirdItemCard">
			  <h3>Payment:</h3>
			  <table>
			    <tr>
			      <td>
				<?php echo "...-".substr($getUserResult->billing_card_number,-4); ?>
			      </td>
			    </tr>
			  </table>
			</div> <br><br><br>
			<input type="button" id="ticketPrev" name="ticketPrev" value="Previous" onclick="showHide('#secondBuyTicket','#thirdBuyTicket');">
			<form name="ticketConfirmForm"  action="#buyTicket" method="POST">
			  <input type="submit" id="submitTicket" name="submitTicket" value="Submit">
			</form>
			</div>
			<div id="ticketConfirmation" class="hiddenDisplay" <?php echo $ticket4Hidden; ?>>
			  <font size="14">Thank you for your purchase!</font><br>
			  An email has been sent to you about this purchase<br>
			  Page will redirect to homepage in 5 seconds.
			  <br><br>
			  <?php echo $ticket; ?>
			</div>
		      </div>
	     </section>
	</div>

<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript">  
  jQuery(function($) {
    $('#cardExpTB').mask('99/9999',{placeholder:" "});
    $('#cardExpTBt').mask('99/9999',{placeholder:" "});
  });
</script>
</body>
</html>
