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

<title>Buy things!</title>
</head>
<body onload="screenheight();">
	<div id="buyItemWrapper" class="mainWrapper">
	     <section id="buyItem" class="mainContent">
	     	      <br><br><br><br><br>
		      <div id="buyItemBody" class="buyContent">
			<div class="itemImg">
			  <img src="<?php echo $pathToItemPic; ?>">
			</div>
		        <div class="itemDescr">
			  
			</div>
			<input type="button" id="buyItemBtn" name="buyItemBtn" value="Buy Item!" onclick="loadBuyItem()">
	              </div>
	     </section>
	</div>
	<br>
	<div id="buyTicketWrapper" class="mainWrapper">
	     <section id="buyTicket" class="mainContent">
	     	      <br><br><br><br><br>
		      <div id="buyTicketBody" class="buyContent">

	              </div>
	     </section>
	</div>
</body>
</html>
