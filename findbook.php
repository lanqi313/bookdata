<?php
 require_once('autoload.php');
 session_start();
 $bookname=$_GET['bookname'];
 $username=$_SESSION['valid_user'];
 $db = Factory::create_database();
 $db -> display_html_header("WELCOME:".$username);
 $db -> display_find();
?>

<html>
<body>
<h4>图书信息：</h4>
<table width = "400" border = "1">
 <tr>
  <th align = "left">书名</th>
  <th align = "right">ISBN</th>
  <th align = "right">状态</th>
 </tr>

<?php
  $mysql = Factory::create_mysql();
  $mysql -> find( $bookname );
?>
<tr>
  <td align = "left"><?php echo $mysql -> row[ "bookname" ]; ?></td>
  <td align = "right"><?php echo $mysql -> row[ "isbn" ];  ?></td>
  <td align = "right"><?php echo $mysql -> row[ "state" ]; ?></td>
 </tr>
</table>

</body>
</html>
<?php
 $db -> display_user_menu();
 $db -> display_html_foot();
?>