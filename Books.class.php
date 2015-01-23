<?php
	require_once('autoload.php');
	class Books{

		function book($title,$query,$bookstat,$book_function){
?>
			<html>
			<body>
			<h4><?php echo $title; ?></h4>
			<table width="400" border="1">
 			<tr>
  				<th align="left">书名</th>
  				<th align="right">ISBN</th>
  				<th align="right"><?php echo $bookstat; ?></th>
 			</tr>
			<?php
          $db = Mysql_connect::get_connect();
  				$result = $db ->query( $query );
  				$res_array = array();
   					for ( $count=0; $row = $result->fetch_assoc(); $count++ ) {
     					$res_array[ $count ] = $row;
     					$bookname = $res_array[ $count ]["bookname"];
     					$isbn = $res_array[ $count ]['isbn'];
     					$username = $_SESSION['valid_user'];
			?>				
			<tr>
  				<td align="left"><?php echo $bookname; ?></td>
  				<td align="right"><?php echo $isbn;  ?></td>
  				<td align="right"><?php $this->$book_function($username,$isbn); ?></td>
 			</tr>
			<?php 
   				}
			?>
			</table>

			</body>
			</html>
			<?php
			}
		
		function book_borrow( $username,$isbn ){  
  			$query = "select state from books where isbn='".$isbn."'";
        $db = Mysql_connect::get_connect();
  			$result = $db ->query($query);
  			$row=$result->fetch_assoc(); 
  			if(isset($_GET['method'])&&$_GET['method'] == $isbn){ 
      			echo  "borrow";  
      			$query  = "update books set  state='no' where isbn='$isbn'";
      			$result = $db->query($query);      
      			$query  = "insert into userbook values ('$username','$isbn')";
      			$result = $db->query($query);
    			}
  			else if($row['state'] == "no"){ 
  				echo   "borrow";  
    			}
  			else if($row['state'] == "yes"){
  				echo  '<a href="bookdata_out.php?method='.$isbn.'">borrow </a>'; 
    			}
			}

		function book_back($username,$isbn){

  			$query="select state from books where isbn='".$isbn."'";
        $db = Mysql_connect::get_connect();
  			$result = $db ->query($query);
  			$row=$result->fetch_assoc(); 
  			if(isset($_GET['method'])&&$_GET['method'] == $isbn){ 
      			echo  '<a href="user_bookdata.php?method = '.$isbn.'">back</a>'; 
      			$query  = "delete from userbook where isbn = '$isbn'";
      			$result = $db->query($query);
      			$query  = "update books set  state='yes' where isbn='$isbn'";
      			$result = $db->query($query); 
    			}
  			else if($row['state']=="no"){
  				echo '<a href="user_bookdata.php?method='.$isbn.'">back</a>'; 
    			}
 
			}


	}