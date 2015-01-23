<?php
  require_once ('autoload.php');
	class Display{

    public $title;
		function display_login_form(){
			?>
			<p><a href="register_form.php">Not a member?</a></p>
  				<form method="post" action="bookdata_out.php">
 					 <table bgcolor="#cccccc">
  						 <tr>
   				     		<td colspan="2">Members log in here:</td>
  						 <tr>
     						<td>Username:</td>
     						<td><input type="text" name="username"/></td></tr>
   						<tr>
     						<td>Password:</td>
   							<td><input type="password" name="passwd"/></td></tr>
   						<tr>
     						<td colspan="2" align="center">
   						 	<input type="submit" value="Log in"/></td></tr>
  						<tr>
    						<td colspan="2"><a href="forgot_form.php">Forgot your password?</a></td>
   						</tr>
 					</table>
 				</form>
		  <?php	

		}

		function display_html_foot(){
		}

		function display_html_header($title){

      $this->title=$title;
        ?>
  <html>
  <head>
    <title><?php echo $this->title; ?></title>
    <style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <table width="100%" border="0" cellspacing="0" bgcolor="#cccccc">
  <tr>
  <td rowspan="2">
  <a href="index.php"></a>
  </td>
  <td align="right" valign="bottom">
 
  </td>

  <td align="right" rowspan="2" width="135">
  <?php
      $chick = Factory::create_check();
      $chick->check_session();
  ?>
  </tr>
  <tr>
  <td align="right" valign="top">
 
  </td>
  </tr>
  </table>
  <?php
    if($this->title) {
      $this->display_html_heading($this->title);
     }
	 }

	 function display_site_info(){
			?>
				<ul>
					<li>Store your bookmarks online with us!</li>
					<li>See what other users use!</li>
  					<li>Share your favorite links with others!</li>
  				</ul>
			<?php
		}

    function display_button($target, $image, $alt) {
      echo "<div align=\"center\"><a href=\"".$target."\">
              <img src=\"images/".$image.".gif\"
                alt=\"".$alt."\" border=\"0\" height=\"50\"
                width=\"135\"/></a></div>";
    }

    
    function display_registration_form() {

        ?>
          <form method="post" action="register_new.php">
          <table bgcolor="#cccccc">
   
            <tr>
              <td>username <br />(max 16 chars):</td>
              <td valign="top"><input type="text" name="username"
                  size="16" maxlength="16"/></td></tr>
            <tr>
              <td>Password <br />(between 6 and 16 chars):</td>
              <td valign="top"><input type="password" name="passwd"
                  size="16" maxlength="16"/></td></tr>
            <tr>
              <td>Confirm password:</td>
              <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
            <tr>
              <td colspan=2 align="center">
              <input type="submit" value="Register"></td></tr>
          </table></form>
        <?php
    }
    function display_html_heading($heading) {

        ?>
          <h2><?php echo $heading; ?></h2>
        <?php
    }

    function display_html_url($url, $name) {

        ?>
         <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
        <?php
    }
    function display_find(){

      ?>
        <form name="input" action="findbook.php" method="get">
        查找图书信息: 
        <input type="text" name="bookname" />
        <input type="submit" value="搜索" />
        </form>
        <?php
    }

    function display_user_menu() {

      ?>
        <hr />
        <a href="bookdata_out.php">Home</a> 
        <br />
        <a href="user_bookdata.php">User's book</a> 
        <br />
        <a href="change_passwd_form.php">Change password</a>
        <br />
        <a href="logout.php">Logout</a>
        <hr />

        <?php 
    }
    function display_password_form() {
        ?>
        <br />
        <form action="change_passwd.php" method="post">
        <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
        <tr><td>Old password:</td>
            <td><input type="password" name="old_passwd"
                size="16" maxlength="16"/></td>
        </tr>
        <tr><td>New password:</td>
            <td><input type="password" name="new_passwd"
                size="16" maxlength="16"/></td>
        </tr>
        <tr><td>Repeat new password:</td>
            <td><input type="password" name="new_passwd2"
                size="16" maxlength="16"/></td>
        </tr>
        <tr><td colspan="2" align="center">
            <input type="submit" value="Change password"/>
        </td></tr>
        </table>
        <br />
        <?php
    }

    function display_forgot_form() {
        ?>
        <br />
        <form action="forgot_passwd.php" method="post">
        <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
        <tr><td>Enter your username</td>
            <td><input type="text" name="username" size="16" maxlength="16"/></td>
        </tr>
        <tr><td colspan=2 align="center">
            <input type="submit" value="Change password"/>
        </td></tr>
        </table>
        <br />
      <?php
    }
    function display_admin_menu() {
        ?>
        <hr />
        <a href="insert_book_form.php">insert book</a> 
        <br />
        <a href="delete_book_form.php">delete book</a>
        <hr />

        <?php 
    }
    function display_book_form() {

        ?>
        <form method="post"   action="insert_book.php">
          <table border="0">
            <tr>
              <td>BookISBN:</td>
              <td><input type="text" name="isbn"/></td>
            </tr>
            <tr>
              <td>Bookname:</td>
              <td><input type="text" name="bookname"/></td>
            </tr>
            <tr>
              <td>Bookstate:</td>
              <td><input type="text" name="state"/></td>
            </tr>   
            <tr>
              <td colspan=2 align="center"><input type="submit"  value="Add  Book" /></td>
            </tr>
        </table>
      </form>
      <?php
    }
    function display_delbook_form() {
        ?>
        <form method="post"   action="delete_book.php">
          <table border="0">
          <tr>
            <td>Book ISBN:</td>
            <td><input type="text" name="isbn"/></td>
          </tr>
          <tr>
            <td colspan=2 align="center"><input type="submit"  value="Delete Book" /></td>
          </tr>
          </table>
        </form>
      <?php
      }



}