<?php include("signin_validation.php"); ?>
<?php include("signup_validation.php"); ?>
<div id="signInDiv">
     <h1><font size="14pt">Sign Up/Sign In</font></h1>				
	<form name="signInForm" action="index.php#signIn" method="post">
		<table id="signInTable">
		<tr>
			<td colspan="2">
				<input type="text" name="signInEmail" placeholder="Email" value="<?php echo htmlspecialchars($loginEmail); ?>"><span class="signupError"><?php echo $emailError; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="password" name="signInPassword" placeholder="Password"><span class="signupError"><?php echo $pwError; ?></span>
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="password" name="signInPasswordRe" placeholder="Re-enter Password">
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="text" name="signUpFName" placeholder="First Name" value="<?php echo htmlspecialchars($loginFname); ?>"><span class="signupError"><?php echo $fnameError; ?></span>
		       </td>
		</tr>
		<tr style="display:none;" class="signUpHdn">
			<td colspan="2">
				<input type="text" name="signUpLName" placeholder="Last Name" value="<?php echo htmlspecialchars($loginLname); ?>">
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
	<span class="signupError"><?php echo $loginError; ?></span>
</div>
