<?php include("addItem_validation.php"); ?>
<div id="itemManager">
     <div id="addItemContent" class="mainContent">
     <h2>Add Item to Item Queue:</h2>
     <span <?php echo $errorColor; ?>>Do not leave anything blank</span>
     <br><br>
     <form name="addItemForm" action="admin.php" method="post" enctype="multipart/form-data">
     	   <table id="addItemTable">
	   	  <tr class="spaceunder">
			<td>
				<input type="text" id="itemNameTXT" name="itemNameTXT" placeholder="Item Name" value="<?php echo htmlspecialchars($itemName); ?>">
			</td>
		  </tr>
		  <tr>
			<td>    
				Item Picture:  <?php echo $picError;  ?>
			</td>
		  </tr>
		  <tr class="spaceunder">
			<td>
				<input type="file" name="itemPicture">
			</td>
		  </tr>
		  <tr>
			<td>
				400 characters
			</td>
		  </tr>
		  <tr class="spaceunder">
			<td>
				<textarea name="itemDescrTXT" rows="9" cols="50" maxlength="400" placeholder="Item Description"><?php echo $itemDescr;  ?></textarea>
			</td>
		  </tr>
		  <tr class="spaceunder">
			<td>
				<input type="text" name="itemCostTXT" placeholder="Item Cost" value="<?php echo htmlspecialchars($itemCost); ?>"><?php echo $costError;  ?>
			</td>
		  </tr>
		  <tr class="spaceunder">
			<td>
				<input type="text" name="itemTicketCostTXT" placeholder="Item Ticket Cost" value="<?php echo htmlspecialchars($itemTicketCost); ?>"><?php $ticketCostError;  ?>
			</td>
		  </tr>
		  <tr>
			<td>
				<input type="submit" id="addItemSubmit" name="addItemSubmit" value="Add Item">
			</td>
		  </tr>
	   </table>
     </form>
     </div>
     <br>
     <div id="itemQueueWrapper">
     <h2>Current Item Queue:</h2>
     <table id="itemQueue" class="mainwrapper">
     	    <?php   
	    	    $itemQueueQuery = "SELECT * 
		    		       FROM `ROFL.ITEM` I, `ROFL.ITEM_OF_THE_DAY` D
				       WHERE I.item_id = D.item_id
				       AND date_of_raffle >= CURDATE()
				       ORDER BY date_of_raffle";
		    $itemQueueResult = mysqli_query($c, $itemQueueQuery);

		    $i = 1;

		    while($item = mysqli_fetch_array($itemQueueResult)) {
		    	if($i%4 == 1) {
				echo "<tr>";
			}

			$pathToPicture = "img/items/".$item['item_picture'];
			$i++;

			echo "<td style=\"width:20%;\"><img src=\"".$pathToPicture."\" style=\"width:13em;\"><br>";
			echo "<small>".$item['item_name']."</small><br>";
			echo "<small>".$item['item_description']."</small><br>";
			echo "<small>$".$item['item_cost']."</small><br></td>";
		    	if($i%4 == 1) {
				echo "</tr>";
		    	}
		    }
	    ?>
     </table>
     <br>
     </div>
</div>