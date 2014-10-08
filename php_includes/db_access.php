<?php

	$target = "../db_access.conf";
	if (!file_exists($target)) {
	   echo "Cannot find db_access.conf";
	   exit;
	}

	$DBinfo = fopen($target, "r") or die("Unable to open db_access.conf");

		

	fclose($DBinfo);
?>