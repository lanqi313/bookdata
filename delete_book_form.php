<?php

	require_once('autoload.php');
	session_start();
	$db = Factory::create_database();
	$db -> display_html_header("delete  book");
	$check = Factory::create_check();
	if ($check -> check_admin_user()) {
  		$db -> display_delbook_form();
  		$db -> display_html_url("bookdata_out.php?username=admin", "Back to administration menu");
	} else {
  		echo "<p>You are not authorized to enter the administration area.</p>";
	}
	$db -> display_html_foot();

?>

