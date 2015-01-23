<?php
  require_once("autoload.php");
  $db = Factory::create_database();
  $db ->display_html_header("Resetting password");

  // creating short variable name
  $username = $_POST['username'];

  try {    
    echo 'Your new password has been emailed to you.<br />';
  }
  catch (Exception $e) {
    echo 'Your password could not be reset - please try again later.';
  }
  $db -> display_html_url('login.php', 'Login');
  $db -> display_html_foot();
?>
