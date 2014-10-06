<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta name="description" content="rofl. Get tickets to win items for sale.">
<meta name="keywords" content="rofl, raffle, tickets, sale, buy, purchase, woot, meh">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include("php_includes/menu_bar.php"); ?>
<?php include("php_includes/header.php"); ?>
<title>rofl.</title>
</head>
<body>
	<div id="itemSpaceWrapper" class="mainWrapper">
		<section id="itemSpace" class="mainContent">
			<br><br><br><br><br>
			item.
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
			<br><br><br><br><br>
			
			
			<div id="signInDiv">
				<h1><font size="20">Sign In</font></h1>
				<br>
				<form name="signInForm" action="index.php#signIn" method="post">
					<table id="signInTable">
						<tr>
							<td>
								<input type="text" name="signInEmail" placeholder="Email">
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="signInPassword" placeholder="Password">
							</td>
						</tr>
						<tr>
							<td>
								<br>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="signInSubmit" value="Sign In">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div id="signUpDiv">
				<h1><font size="20">Sign Up</font></h1>
				<br>
				<form name="signUpForm" action="index.php#signIn" method="post">
					<table id="signUpTable">
						<tr>
							<td>
								<input type="text" name="signUpEmail" placeholder="Email">
							</td>
						</tr>
							<tr>
							<td>
								<input type="password" name="signUpPassword" placeholder="Password">
							</td>
						</tr>
						<tr>
							<td>
								<br>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="creditDebit" placeholder="Credit/Debit">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="creditDebitExp" placeholder="Expiration Date">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="billingAddress" placeholder="Billing Address">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="billingZip" placeholder="Billing Zip">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="billingCity" placeholder="Billing City">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="billingState" placeholder="Billing State">
							</td>
						</tr>
						<tr>
							<td>
								<br>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="shippingAddress" placeholder="Shipping Address">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="shippingZip" placeholder="Shipping Zip">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="shippingCity" placeholder="Shipping City">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="shippingState" placeholder="Shipping State">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="phone" placeholder="Phone Number">
							</td>
						</tr>
						<tr>
							<td>
								<br>
							</td>
						</tr>						
						<tr>
							<td>
								<input type="submit" name="signUpSubmit" value="Sign Up">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</section>
	</div>
<?php include("php_includes/footer.php"); ?>
</body>
</html>