<?php require_once('Connections/conn_daftar.php'); 

?>
<?php
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

mysql_select_db($database_conn_daftar, $conn_daftar);		

$sql = mysql_query("SELECT * FROM db_anggota ORDER BY id_anggota DESC ", $conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data = mysql_fetch_assoc($sql);
    }
	
$maxRows_user = 1;
$pageNum_user = 0;
if (isset($_GET['pageNum_user'])) {
  $pageNum_user = $_GET['pageNum_user'];
}
$startRow_user = $pageNum_user * $maxRows_user;

$colname_user = "-1";
if (isset($_GET['id_anggota'])) {
  $colname_user = $_GET['id_anggota'];
}
mysql_select_db($database_conn_daftar, $conn_daftar);
$query_user = sprintf("SELECT Username, Password FROM db_anggota WHERE id_anggota = %s", GetSQLValueString($colname_user, "int"));
$query_limit_user = sprintf("%s LIMIT %d, %d", $query_user, $startRow_user, $maxRows_user);
$user = mysql_query($query_limit_user, $conn_daftar) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);

if (isset($_GET['totalRows_user'])) {
  $totalRows_user = $_GET['totalRows_user'];
} else {
  $all_user = mysql_query($query_user);
  $totalRows_user = mysql_num_rows($all_user);
}
$totalPages_user = ceil($totalRows_user/$maxRows_user)-1;

$pageNum_userberhasil = 0;
if (isset($_GET['pageNum_userberhasil'])) {
  $pageNum_userberhasil = $_GET['pageNum_userberhasil'];
}
/*$startRow_userberhasil = $pageNum_userberhasil * $maxRows_userberhasil;*/
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
<title>Daftar | ZORRO CINEMA</title>
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
    <div id="menu"><ul class="Red" id="menu_wrap" name="menu_wrap"><li class="button"><a href="index.php">Home</a></li><li class="button"><a href="whatson.php">What's On</a></li><li class="button"><a href="release.php">Releases</a></li><li class="button"><a href="booking-login.php">Booking</a></li><li class="button"><a href="about.php">About</a></li>
      </ul>
    </div>
    <div id="centerlog">
     <h3>&nbsp;</h3>
     <h3>&nbsp;</h3>
     <h3>&nbsp;</h3>
     <h3>Terimakasih Anda telah bergabung dengan ZORRO CINEMA</h3>
<h3>Mohon diingat Username dan Password Anda</h3>
<table border="0" align="center">
  <tr>
    <td width="83">Username :</td>
    <td width="180"><?php echo $data['Username']; ?></td>
  </tr>
  <tr>
    <td>Password :</td>
    <td><?php echo $data['Password']; ?></td>
  </tr>
</table>
<h3 align="center"><a href="booking-login.php">Klik disini untuk login</a></h3>
</div></div></div>
     <div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div></div>

</body>
</html>
<?php
/*mysql_free_result($user);

mysql_free_result($userberhasil);
*/
?>
