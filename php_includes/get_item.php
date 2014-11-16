<?php
     $buyItemQuery = "SELECT *
     		     	     FROM `ROFL.ITEM` I, `ROFL.ITEM_OF_THE_DAY` D
			     WHERE I.item_id = D.item_id
			     AND  date_of_raffle=CURDATE()";
     $buyItemSQL = $c->query($buyItemQuery);
     $buyItemResult = $buyItemSQL->fetch_object();
     $pathToItemPic = "img/items/".$buyItemResult->item_picture;
     
     $count = mysqli_num_rows ($buyItemSQL);
     
     if ($count != 1) {
     	$buyItemResult->item_name = "There is no item of the day. We made a mistake and we are going to fire some adminstrators. <br>Sorry for your inconvenience.";
     }

     mysqli_free_result($buyItemSQL);
?>