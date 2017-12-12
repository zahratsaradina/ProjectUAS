<?php require_once('Connections/conn_daftar.php'); ?>
<?php
  session_start();
 
  $namanya=$_SESSION["nama_lengkap"];
?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
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

$maxRows_profile = 10;
$pageNum_profile = 0;
if (isset($_GET['pageNum_profile'])) {
  $pageNum_profile = $_GET['pageNum_profile'];
}
$startRow_profile = $pageNum_profile * $maxRows_profile;

$colname_profile = "-1";
if (isset($_GET['id_anggota'])) {
  $colname_profile = $_GET['id_anggota'];
}
mysql_select_db($database_conn_daftar, $conn_daftar);
$query_profile = sprintf("SELECT nama_lengkap, tgllahir, Username, Password, konfirm_pass, email, no_hp, alamat FROM db_anggota WHERE id_anggota = %s", GetSQLValueString($colname_profile, "int"));
$query_limit_profile = sprintf("%s LIMIT %d, %d", $query_profile, $startRow_profile, $maxRows_profile);
$profile = mysql_query($query_limit_profile, $conn_daftar) or die(mysql_error());
$row_profile = mysql_fetch_assoc($profile);

if (isset($_GET['totalRows_profile'])) {
  $totalRows_profile = $_GET['totalRows_profile'];
} else {
  $all_profile = mysql_query($query_profile);
  $totalRows_profile = mysql_num_rows($all_profile);
}
$totalPages_profile = ceil($totalRows_profile/$maxRows_profile)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Profile | ZORRO CINEMA</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/gaya.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="bg">
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
     <div id="bg2">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"></li>
        <li class="button"><a href="loginsukses.php">Order</a></li>
        <li class="button"><a href="lap-pemesanan-tiket-member.php">Laporan Pemesanan</a></li>
        <li class="button"><a href="#">Update Profil</a></li>
        <li class="button"><a href="<?php echo $logoutAction ?>">Logout</a></li>
      </ul>
    </div>
<div id="menu2"></div>
<div id="isi-update-profil">
  <table border="0">
    <tr>
      <td>nama_lengkap</td>
      <td>tgllahir</td>
      <td>Username</td>
      <td>Password</td>
      <td>konfirm_pass</td>
      <td>email</td>
      <td>no_hp</td>
      <td>alamat</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_profile['nama_lengkap']; ?></td>
        <td><?php echo $row_profile['tgllahir']; ?></td>
        <td><?php echo $row_profile['Username']; ?></td>
        <td><?php echo $row_profile['Password']; ?></td>
        <td><?php echo $row_profile['konfirm_pass']; ?></td>
        <td><?php echo $row_profile['email']; ?></td>
        <td><?php echo $row_profile['no_hp']; ?></td>
        <td><?php echo $row_profile['alamat']; ?></td>
      </tr>
      <?php } while ($row_profile = mysql_fetch_assoc($profile)); ?>
  </table>
  <p>&nbsp;</p>
</div>

<div id="footer"></div><div id="footer1">Copyright © 2017 Zahra Tsaradina S<a href="file:///C:/xampp/htdocs/cinema-world/index.html#"></a> - All Rights Reserved</div>
</div>
    </div>
    	
</body>
</html>
<?php
mysql_free_result($profile);
?>
