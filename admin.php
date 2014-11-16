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
<?php include("php_includes/header.php"); ?>
<?php include("php_includes/db_access.php"); ?>
<title>Admins!</title>
</head>
<body>
<div id="adminHeader" class="mainWrapper">
     <br>
     Admin Page
     <br>
     <a href="index.php">>>ROFL Main<<</a>
</div>
<div id="adminMain" class="mainWrapper">
  <div id="adminMainContent" class="mainContent">
    <?php 
       $selectJobQuery = "SELECT job_title
      			  FROM `ROFL.ADMIN`
			  WHERE user_email = '".$_SESSION['user']."'";
       $selectJobSQL = $c->query($selectJobQuery);
       $selectJobResult = $selectJobSQL->fetch_object();
       mysqli_free_result($selectJobSQL);

       if ($selectJobResult->job_title == "Item Manager") {
	 include("php_includes/itemManager.php");			   
       }
	 ?>
    </div>
</div>
</body>
</html>
