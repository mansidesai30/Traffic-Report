<?php
//start the session
session_start();
//set the session variables
unset($_SESSION['login_user']);
unset($_SESSION['user_type']);
unset($_SESSION['valid']);
// destroy the session 
session_destroy();
//redirect to index page
header("Location: index.php");
exit;

?>
