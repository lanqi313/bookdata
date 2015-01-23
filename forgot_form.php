<?php
 require_once('autoload.php');
 $db = Factory::create_database();
 $db -> display_html_header('Reset password'); 
 $db -> display_forgot_form();
 $db -> display_html_foot();
?>
