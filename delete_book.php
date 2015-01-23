<?php

    require_once('autoload.php');
    session_start();
    $db = Factory::create_database();
    $db -> display_html_header("Delete a book");
    $check = Factory::create_check();
    $mysql = Factory::create_mysql();
    if ($check -> check_admin_user()){
        if ( $check -> check_form($_POST)){
            $isbn = $_POST['isbn'];     
            if( $mysql -> delete_book($isbn)){
                echo "<p>A book  was delete in the database.</p>";
              } else {
                   echo "<p>Book  could not be delete in the database.</p>";
              }
          } else {
              echo "<p>You have not filled out the form.  Please try again.</p>";
          }
        $db -> display_html_url("bookdata_out.php", "Back to administration menu");
      } else {
          echo "<p>You are not authorised to view this page.</p>";
      }
    $db -> display_html_foot();

?>
