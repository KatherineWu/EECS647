<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta name="description" content="rofl. Get tickets to win items for sale.">
<meta name="keywords" content="rofl, raffle, tickets, sale, buy, purchase, woot, meh">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php session_start(); ?>
<?php include("php_includes/db_access.php"); ?>
<?php include("php_includes/menu_bar.php"); ?>
<?php include("php_includes/header.php"); ?>
<?php include("php_includes/get_item.php"); ?>


<title>rofl.</title>
</head>
<body>
	<div id="itemSpaceWrapper" class="mainWrapper">
		<section id="itemSpace" class="mainContent">
			<br><br><br><br><br>

			<div class="img itemImg"><img style="max-width:450px" src="<?php echo $pathToItemPic; ?>"></div>
			<div class="itemDescr">
			  <h2><?php echo $buyItemResult->item_name; ?></h2>
			  <?php echo $buyItemResult->item_description; ?><br><br>
			  Tickets: <b>$<?php echo $buyItemResult->cost_of_ticket; ?></b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sale Price: <b>$<?php echo $buyItemResult->item_cost; ?></b>
			</div>
			<a <?php 			   
														if(!isset($_SESSION['user'])) {
				echo "href=\"index.php#signIn\"";
			   }
			   else {
				echo "href=\"buyThings.php#buyItem\"";
			   }
														?> class="linkButton" id="buyItemButton">Buy Item</a>
			<a <?php 			   
														if(!isset($_SESSION['user'])) {
				echo "href=\"index.php#signIn\"";
			   }
			   else {
				echo "href=\"buyThings.php#buyTicket\"";
			   }
			?> class="linkButton" id="buyTicketButton">Buy Tickets</a>
		</section>
	</div>
	<div id="aboutUsWrapper" class="mainWrapper vertical-slide">
		<section id="aboutUs" class="mainContent">
			<br><br><br><br><br>
			<h1 class="hidden" ><font size="20">rofl?</font></h1>
			<h2 class="hidden">New Rofl Item will be posted each day.</h2>
			<h3 class="hidden">Buy raffle tickets to get a chance to win the Rofl Item at a flat price of $5.<br>
							   Otherwise, buy the Rofl Item at sale price.</h3>
			<h3 class="hidden">Buy more tickets to increase your chance of winning.</h3>
			<h2 class="hidden"><a href="index.php#signIn">Sign up now for this great offer!</a></h2><br>
		</section>
	</div>
	<div id="winningNumWrapper" class="mainWrapper">
		<section id="winningNum" class="mainContent">
			<br><br><br><br><br>
			<h1 class="hidden" ><font size="20">Yesterday's Winning Rofl:</font></h1>
			<h2 class="hidden">1</h2>
		</section>
	</div>
	<div id="signInWrapper" class="mainWrapper">
		<section id="signIn" class="mainContent">
			<br><br><br><br><br><br>
			
			<?php 
			   if(!isset($_SESSION['user'])) {
			     include("php_includes/signin.php");
			   }
			   else {
			     include("php_includes/account_settings.php");
			   }
			?>
		</section>
	</div>
<?php include("php_includes/footer.php"); ?>
</body>
</html>
