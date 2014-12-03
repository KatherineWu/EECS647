<?php

$to      = $email; // Send email to our user
$subject = 'ROFL.com Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up on ROFL.com!
Your account has been created, you can login after you have activated your account by pressing the url below.
 
Please click this link to activate your account:
http://people.eecs.ku.edu/kwu96/rofl/verify.php?email='.$email.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@rofl.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

?>

