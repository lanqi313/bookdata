<?php
    require_once('autoload.php');
    session_start();
    $db = Factory::create_database();
    $db -> display_html_header("Adding a book");
    $check = Factory::create_check();
    if ($check -> check_admin_user()){
    if ($check -> check_form($_POST)){
         $isbn = $_POST['isbn'];
         $bookname = $_POST['bookname'];
         $state = $_POST['state'];
         $mysql = Factory::create_mysql();
         if ($mysql -> insert_book($bookname, $isbn, $state)){

        echo "<p>Book <em>".stripslashes($bookname)."</em> was added to the database.</p>";
          } else {
              echo "<p>Book <em>".stripslashes($bookname)."</em> could not be added to the database.</p>";
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
