<?php
     $buyItemQuery = "SELECT *
     		     	     FROM `ROFL.ITEM` I, `ROFL.ITEM_OF_THE_DAY` D
			     WHERE I.item_id = D.item_id
			     AND  date_of_raffle=DATE(CONVERT_TZ(NOW(),'+0:00','-2:30'))";
     $buyItemSQL = $c->query($buyItemQuery);
     $buyItemResult = $buyItemSQL->fetch_object();
     $pathToItemPic = "img/items/".$buyItemResult->item_picture;
     mysqli_free_result($buyItemSQL);
?>