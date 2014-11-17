<?php
	$target = "./img/items/";
	$errorColor=$picError=$costError=$ticketCostError=$itemName=$itemDescr=$itemCost=$itemTicketCost='';
	if (isset($_POST['addItemSubmit'])) {
	   if (!empty($_POST)) {
	      $error = false;

	      if (empty($_POST['itemNameTXT']) || empty($_POST['itemDescrTXT']) || empty($_POST['itemCostTXT']) || empty($_POST['itemTicketCostTXT']) || $_FILES['itemPicture']['error'] != 0) {
	      	 $errorColor = " style=\"color:#FF0000;font-size:14pt;\" ";
		 $error = true;
	      }
	      $itemName = $_POST['itemNameTXT'];
	      $itemDescr = $_POST['itemDescrTXT'];
	      $itemCost = $_POST['itemCostTXT'];
	      $itemTicketCost = $_POST['itemTicketCostTXT']; 
	      
	      if($_FILES['itemPicture']['error'] == 0 && !preg_match('/^image\/(pjpeg|gif|png|x-png|jpeg|jpg)/', $_FILES['itemPicture']['type'])) {
	      	  $error = true;
		  $picError = "<span style=\"color:#FF0000;font-size14pt;\">Images only</span>";
	      }
	      
	      if (!empty($_POST['itemCostTXT']) && !preg_match('/^\d+(?:\.\d{2})?$/', $_POST['itemCostTXT'])) {
	      	 $costError = "<span style=\"color:#FF0000;\">This is not currency</span>";
		 $error = true;
	      }

	      if (!empty($_POST['itemTicketCostTXT']) && !preg_match('/^\d+(?:\.\d{2})?$/', $_POST['itemTicketCostTXT'])) {
	      	 $ticketCostError = "<span style=\"color:#FF0000;\">This is not currency</span>";
		 $error = true;
	      }
	      
	      if ($error == false) {
	      	 mysqli_query($c, "START TRANSACTION");
	      	 $insertItemQuery = "INSERT INTO `ROFL.ITEM`
		 		     ( item_picture,
				       item_name,
				       item_cost,
				       item_description )
				     VALUES 
				     ( '".$_FILES['itemPicture']['name']."',
				       '".$itemName."',
				       '".$itemCost."',
				       '".$itemDescr."' )";
		 if (!mysqli_query ($c, $insertItemQuery)) {
		    echo "Failed to insert item";
		    mysqli_query($c, "ROLLBACK");
		    exit;
		 }

		 $target = $target.basename($_FILES['itemPicture']['name']);
		 move_uploaded_file($_FILES['itemPicture']['tmp_name'], $target);
		 chmod($target, 0777);
		 
		 $insertROFLQuery = "INSERT INTO `ROFL.ITEM_OF_THE_DAY`
		 		     ( date_of_raffle,
				       cost_of_ticket )
  				     SELECT DATE_ADD(max(date_of_raffle), INTERVAL 1 DAY), '".$itemTicketCost."' FROM `ROFL.ITEM_OF_THE_DAY`";
	 	 if (!mysqli_query ($c, $insertROFLQuery)) {
		    echo "Failed to insert item to item queue";
		    mysqli_query($c, "ROLLBACK");
		    exit;
		 }

		 mysqli_query ($c, "COMMIT");

		 header("location: ./admin.php");
	      }
	   }
	}
?>