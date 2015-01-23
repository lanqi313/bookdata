<?php

	require_once('autoload.php');

	class Mysql{

		public $row;  
		
		function  user_register($username,$passwd){
			$query = "select * from user where username = '".$username."' ";
                        $db = Mysql_connect::get_connect();
			$query = $db -> query($query);
			if(!$query){
				throw new Exception("Could not exit query");				
			}
			if($query->num_rows>0){
				throw new Exception('That username is taken - go back and choose another one.');
			}
			$query = "insert into user values ('".$username."',sha1('".$passwd."')) ";
			$result = $db -> query($query);
			if(!$result){
				throw new Exception('Could not register you in database - please try again later.');
			}
			return true;
		}

		function login($username, $password) {
                        $db = Mysql_connect::get_connect();
  			$result = $db ->query("select * from user
                         where username='".$username."'
                         and password = sha1('".$password."')");
  			if (!$result) {
     				throw new Exception('Could not log you in.');
  					}

  			if ($result->num_rows>0) {
     				return true;
  				} else {
     			throw new Exception('Could not log you in  no user.');
  			}
		}
		function find($bookname){

  			$query = "select * from books where books.bookname='".$bookname."'";
                        $db = Mysql_connect::get_connect();
  			$result = $db -> query($query);
  			$this -> row = array();
  			$this -> row = $result -> fetch_assoc(); 
		}
		function change_password($username, $old_password, $new_password) {

  			$this -> login($username, $old_password);
                        $db = Mysql_connect::get_connect();
  			$result = $db -> query("update user
                          			set password = sha1('".$new_password."')
                          			where username = '".$username."'");
  			if (!$result) {
    			throw new Exception('Password could not be changed.');
  			} else {
    			return true;  
  			}
			}

		function insert_book($bookname, $isbn, $state) {
   			$query = "select *  from books where isbn='".$isbn."'";
                        $db = Mysql_connect::get_connect();
   			$result = $db -> query($query);
   			if ((!$result) || ($result->num_rows!=0)) {
     			return false;
  				 }
   			$query = "insert into books values
            		('".$bookname."', '".$isbn."', '".$state."')";

   			$result = $this -> db -> query($query);
   			if (!$result) {
     			return false;
   			} else {
     			return true;
   				}
			}

		function delete_book($isbn) {
		        $query = "select *  from books  where isbn='".$isbn."'";
                        $db = Mysql_connect::get_connect();
   			$result = $db -> query($query);
   			if ((!$result) || ($result->num_rows!=1)) {
        		return false;
   				}
			$query = "delete from books where isbn='".$isbn."'";
   			$result = $db -> query($query);
   			if (!$result) {
     			return false;
   					} else {
     					return true;
   							}
			}
		
     				
}