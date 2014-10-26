<?php
	$getUserQuery = "SELECT *
		      		FROM `ROFL.USERS`
				WHERE user_email = '".$cuser."'";
	$getUserSQL = $c->query($getUserQuery);
	$getUserResult = $getUserSQL->fetch_object();
	mysqli_free_result($getUserSQL);
?>
