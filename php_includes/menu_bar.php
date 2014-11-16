<?php 
      if (isset($_SESSION['user'])) {
      	 $account = "Account";
      }
      else {
      	 $account = "Sign In";
      }
?> 
<div id="menu">
	<div id="menuMenu">
		<div id="menuLogo">
			<a href="index.php"><img src="./img/logo.png" id="logoImg" class="image" alt="rofl."></a>
		</div>
		<ul id="ulMenu">
		<?php 
		      if (isset($_SESSION['user'])) {
      		      	 echo "<li><a href=\"php_includes/signout.php\">Sign Out</a></li>";
		      }
		?>
			<li>
				<a href="index.php#signIn"> <?php echo $account; ?> </a>
			</li>
			<li>
				<a href="index.php#winningNum"> Winner </a>
			</li>
			<li>
				<a href="index.php#aboutUs"> About </a>
			</li>
			<li>
				<a href="index.php#itemSpace"> Item </a>
			</li>
		</ul>
	<?php 
		      	      if (isset($_SESSION['user'])) {
			      	 $selectJobQuery = "SELECT job_title
				 	      	      FROM `ROFL.ADMIN`
						      WHERE user_email = '".$_SESSION['user']."'";
				 $selectJobResult = mysqli_query($c, $selectJobQuery);
				 $count = mysqli_num_rows($selectJobResult);

				 if ($count > 0) {
			      	    echo "<a id=\"adminLink\" href=\"admin.php\">Admin</a>";
				 }
			
				 mysqli_free_result($selectJobResult);
		      	      }
			?>	
	</div>
</div>
			
 