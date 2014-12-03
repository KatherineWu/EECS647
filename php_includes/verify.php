<?php

include('db_access.php');
mysql_select_db("ROFL.USERS") or die(mysql_error()); // Select registration database.
             
if(isset($_GET['user']) && !empty($_GET['user'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
                 
    $search = mysql_query("SELECT first_name, last_name, active FROM `ROFL.USERS` WHERE user_email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE users SET active='1' WHERE user_email='".$email."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}

?>

