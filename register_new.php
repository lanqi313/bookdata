<?php
  require_once('autoload.php');
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  session_start();
  try   {
    $check = Factory::create_check();
    if (!($check->check_form($_POST))) {
      throw new Exception('You have not filled the form out correctly - please go back and try again.');
    }

    if ($passwd != $passwd2) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }

    
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
    }

    $mysql=Factory::create_mysql(); 
    $mysql->user_register($username,  $passwd);
    $_SESSION['valid_user'] = $username;
    $db = Factory::create_database();
    $db->display_html_header('Registration successful');
    echo 'Your registration was successful.  Go to the members page to start setting up your bookmarks!';
    $db->display_html_url('bookdata_out.php', 'Go to members page');
    $db->display_html_foot();
  }
  catch (Exception $e) {
    $db = Factory::create_database();
    $db->display_html_header('Problem:');
    echo $e->getMessage();
    $db->display_html_foot();
     exit;
  }
?>
