<?php
  require_once('autoload.php');
  session_start();  
  $old_passwd = $_POST['old_passwd'];
  $new_passwd = $_POST['new_passwd'];
  $new_passwd2 = $_POST['new_passwd2'];

  $db = Factory::create_database(); 
  $db -> display_html_header('Changing password');


  try {
    $check = Factory::create_check();
    $check -> check_valid_user();
    if (!($check->check_form($_POST))) {
      throw new Exception('You have not filled out the form completely. Please try again.');
    }

    if ($new_passwd != $new_passwd2) {
       throw new Exception('Passwords entered were not the same.  Not changed.');
    }

    if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
       throw new Exception('New password must be between 6 and 16 characters.  Try again.');
    }
    $mysql = Factory::create_mysql();
    $mysql -> change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    echo 'Password changed.';
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  $db ->display_user_menu();
  $db ->display_html_foot();
?>
