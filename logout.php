<?php

require_once('autoload.php');
session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
$result_dest = session_destroy();
$db = Factory::create_database();
$db ->display_html_header('Logging Out');

if (!empty($old_user)) {
  if ($result_dest)  {
    // if they were logged in and are now logged out
    echo 'Logged out.<br />';
    $db -> display_html_url('login.php', 'Login');
  } else {
   // they were logged in and could not be logged out
    echo 'Could not log you out.<br />';
  }
} else {
  // if they weren't logged in but came to this page somehow
  echo 'You were not logged in, and so have not been logged out.<br />';
  $db = display_html_url('login.php', 'Login');
}

$db -> display_html_foot();

?>