<?php require_once('Connections/conn_daftar.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO db_anggota (id_anggota, nama_lengkap, tgllahir, Username, Password, konfirm_pass, email, no_hp, alamat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_anggota'], "int"),
                       GetSQLValueString($_POST['nama_lengkap'], "text"),
                       GetSQLValueString($_POST['tgllahir'], "date"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['konfirm_pass'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['no_hp'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"));
	$userb = $_POST['Username'];
  $passb = $_POST['Password'];					   


  mysql_select_db($database_conn_daftar, $conn_daftar);
  $Result1 = mysql_query($insertSQL, $conn_daftar) or die(mysql_error());

  $insertGoTo = "daftar-berhasil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
<title>Daftar | ZORRO CINEMA</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
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

    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="index.php">Home</a></li>
        <li class="button"><a href="whatson.php">What's On</a></li>
        <li class="button"><a href="release.php">Releases</a></li>
        <li class="button"><a href="#">Booking</a></li>
        <li class="button"><a href="about.php">About</a></li>
        <li class="button"><a href="admin.php">Administrator</a></li> 
      </ul>
    </div>
    <div id="menu2"></div>
  <div id="isi2">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td width="170" align="right" nowrap="nowrap">&nbsp;</td>
        <td width="10" align="right" nowrap="nowrap">&nbsp;</td>
        <td width="443">&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td height="42" colspan="3" align="right" nowrap="nowrap"><div align="center">
          <h2>Form Pendaftaran Anggota ZORRO CINEMA</h2>
          </div></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Nama Lengkap</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><input type="text" name="nama_lengkap" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Tanggal Lahir</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><p align="left">
          <input type="date" name="tgllahir" value="" size="70" />
        </p></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Username</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><input type="text" name="Username" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Password</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><input type="text" name="Password" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Konfirmasi Password</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><input type="text" name="konfirm_pass" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Email</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><p>
          <input type="text" name="email" value="" size="70" />
        </p>
          <div align="left">
            <pre>(contoh: myAcc@gmail.com) </pre>
        </div></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">No HP / Telepon</div></td>
        <td nowrap="nowrap" align="right">:</td>
        <td><input type="text" name="no_hp" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td height="37" align="right" nowrap="nowrap"><div align="left">Alamat</div></td>
        <td align="right" nowrap="nowrap">:</td>
        <td><input name="alamat" type="text" value="" size="70" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Daftar Sekarang" />
        <input type="reset" name="btnBatal" id="btnBatal" value="Batal" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
  <p>&nbsp;</p>

</div>
  <div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div></div>
   
</body>
</html>