<?php include("signin_validation.php"); ?>
<div id="signInDiv">
     <h1><font size="14pt">Sign Up/Sign In</font></h1>				
	<form name="signInForm" action="index.php#signIn" method="post">
		<table id="signInTable">
		<tr>
			<td colspan="2">
				<input type="text" name="signInEmail" placeholder="Email">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="password" name="signInPassword" placeholder="Password">
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="password" name="signInPasswordRe" placeholder="Re-enter Password">
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="text" name="signUpFName" placeholder="First Name">
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="text" name="signUpLName" placeholder="Last Name">
		       </td>
		</tr>
		<tr>
			<td>	
				<br>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" id="signInSubmit" name="signInSubmit" value="Sign In" class="buttonToggle">
				<input type="submit" id="signUpSubmit" name="signUpSubmit" value="Sign Up" style="display:none;" class="buttonToggle">
			</td>
			<td>
				<input type="button" id="showSignUp" name="showSignUp" value="Sign Up" onclick="SHSignUp(this)">
			</td>
		</tr>
		</table>
	</form>
	<br>
	<?php echo $loginError; ?>
</div>
