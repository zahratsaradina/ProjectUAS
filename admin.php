<?php require_once('Connections/conn_admin.php'); ?>
<?php
// *** Validate request to login to this site.
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txUser'])) {
  $loginUsername=$_POST['txUser'];
  $password=$_POST['txPass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "adminsukses.php";
  $MM_redirectLoginFailed = "admingagal.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conn_admin, $conn_admin);
  
  $LoginRS__query=sprintf("SELECT `user`, pwd FROM db_admin WHERE `user`=%s AND pwd=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conn_admin) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $id_admin = $loginFoundUser['id_admin'];
	 $nama_admin = $loginFoundUser['user'];
  
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['id_admin'] = $id_admin;
	$_SESSION['nama_admin'] = $nama_admin;		      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Administrator</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/gaya.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="bg-login">
	<div id="bungkus_luar">
    <div id="ataskepala"></div>
    <div id="kepala">
      <table width="254" border="0" align="center">
        <tr>
          <td width="248" height="111"><img src="images/logo.png" width="261" height="129" /></td>
        </tr>
      </table>
    </div>
     <div id="space2"></div>
     <div id="bg2-login">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="index.php">Home</a></li>
        <li class="button"><a href="whatson.php">What's On</a></li>
        <li class="button"><a href="release.php">Releases</a></li>
        <li class="button"><a href="booking-login.php">Booking</a>
        </li>
        <li class="button"><a href="about.php">About</a></li>
        <li class="button"><a href="#">Administrator</a></li>
      </ul>
    </div>
    <div id="centerlog">
      <div align="center">
        <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="1820" border="0">
            <tr>
              <td width="482" height="28">&nbsp;</td>
              <td width="92">&nbsp;</td>
              <td width="17">&nbsp;</td>
              <td width="412">&nbsp;</td>
              <td width="125">&nbsp;</td>
              <td width="331">&nbsp;</td>
              <td width="331">&nbsp;</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th height="28">&nbsp;</th>
              <th>Username</th>
              <th>:</th>
              <td><input name="txUser" type="text" id="txUser" size="33" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label for="txUser"></label></td>
            </tr>
            <tr>
              <th height="28">&nbsp;</th>
              <th>Password</th>
              <th>:</th>
              <td><input name="txPass" type="password" id="txPass" size="33" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label for="tPass3"></label>
                <label for="txUser"></label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="btnLogin" id="btnLogin" value="Login" />
              <input type="reset" name="btnReset" id="btnReset" value="Reset" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>
        <p>&nbsp;</p>
      </form></div></div></div>
     <div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div></div>

</body>
</html>