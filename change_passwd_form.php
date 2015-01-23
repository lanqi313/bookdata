<?php
 require_once('autoload.php');
 session_start();
 $db = Factory::create_database();
 $db -> display_html_header('Change password');
 $check = Factory::create_check();
 $check -> check_valid_user();
 
 $db -> display_password_form();

 $db -> display_user_menu(); 
 $db -> display_html_foot();
?>
