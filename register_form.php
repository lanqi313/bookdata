<?php
	require_once('autoload.php');
	$db=Factory::create_database();
	$db->display_html_header('User Registration');
	$db->display_registration_form();
	$db->display_html_foot();
?>