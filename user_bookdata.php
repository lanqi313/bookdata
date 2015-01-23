<?php
  require_once('autoload.php');
  session_start();
  $username=$_SESSION['valid_user'];
  $books = Factory::create_books();
  $title = "已借书：";
  $query = "select * from books,userbook where books.isbn=userbook.isbn 
  and userbook.username='".$username."'";
  $bookstat = "还书";
  $books->book($title,$query,$bookstat,'book_back');
  $db = Factory::create_database();
  $db -> display_user_menu();
