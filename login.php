<?php
	require_once('autoload.php');
	$db=Factory::create_database();
 	$db->display_html_header('');
	$db->display_site_info();
	$db->display_login_form();
	$db->display_html_foot();

