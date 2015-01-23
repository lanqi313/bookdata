<?php
  require_once('autoload.php');
	class Check{

		function check_session(){
        $db = Factory::create_database();
    		if(isset($_SESSION['admin_user'])) {
       		$db->display_button('logout.php', 'log-out', 'Log Out');
     			} else {
      		$db->display_button('user_bookdata.php', 'view-cart', 'View Your Shopping Cart');
    			}
  		}

    function check_form($form_vars){
        foreach ($form_vars as $key => $value) {
            if ($value == ''){
                  return false;
                }
          }
          return true;
      }
     
    function check_valid_user() {
      if (isset($_SESSION['valid_user']))  {
          echo "Logged in as ".$_SESSION['valid_user'].".<br />";
            } else {
        $db = Factory::create_database();
        $db->display_html_header('Problem:');
        echo 'You are not logged in.<br />';
        $db->display_html_url('login.php', 'Login');
        $db->display_html_foot();
        exit;
        } 
      } 
    function check_admin_user() {
        if (isset($_SESSION['valid_user'])) {
            return true;
        } else {
          return false;
        }
    }
  }
  