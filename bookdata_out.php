<?php 
  require_once('autoload.php');
  session_start();
  @$username = $_POST['username'];
  @$passwd = $_POST['passwd'];
  if ($username && $passwd) {
     try  {
            Factory::create_mysql()->login($username, $passwd);
            
            $_SESSION['valid_user'] = $username;
           }
      catch(Exception $e)  {
      $db = Factory::create_database();
      $db->display_html_header('Problem:');
      echo 'You could not be logged in.
            You must be logged in to view this page.';
      $db->display_html_URL('login.php', 'Login');
      $db->display_html_foot();
      exit;
    }
  }

  $db = Factory::create_database();
  $db->display_html_header('WELCOME:');
  $check = Factory::create_check();
  $check->check_valid_user();
  $db->display_find();  
  $books = Factory::create_books();
  $title = "所有图书信息：";
  $query = "select * from books";
  $bookstat = "借书";
  $books->book($title,$query,$bookstat,'book_borrow');
  $db->display_user_menu();
  if($_SESSION['valid_user']=="admin"){
      $db->display_admin_menu();
    }

