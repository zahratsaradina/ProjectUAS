<?php require_once('Connections/konek.php'); ?>
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

if ((isset($_GET['hapus'])) && ($_GET['hapus'] != "")) {
  $deleteSQL = sprintf("DELETE FROM film WHERE id=%s",
                       GetSQLValueString($_GET['hapus'], "int"));

  mysql_select_db($database_konek, $konek);
  $Result1 = mysql_query($deleteSQL, $konek) or die(mysql_error());

  $deleteGoTo = "list_film_wo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_konek, $konek);
$query_film_wo = "SELECT * FROM film";
$film_wo = mysql_query($query_film_wo, $konek) or die(mysql_error());
$row_film_wo = mysql_fetch_assoc($film_wo);
$totalRows_film_wo = mysql_num_rows($film_wo);
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
<title>Daftar Film What's On</title>
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
     <div id="space2"></div>
     <div id="bg2">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
<li class="button"></li>
        <li class="button"><a href="adminsukses.php">Home Admin</a></li>
    </div>
<div id="menu2"></div>
<div id="isi-list">
<p>&nbsp;</p>
<h2><a href="input-upload.php" class="btn btn-success" role="button">Tambah Film</a><br><br>
</h2>
<table width="660" border="1" align="center">
  <tr>
    <td width="108" bgcolor="#FF7777"><h3>ID</h3></td>
    <td width="156" bgcolor="#FF7777"><h3>Judul</h3></td>
    <td width="66" bgcolor="#FF7777"><h3>Gambar</h3></td>
    <td width="219" bgcolor="#FF7777"><h3>Tanggal diedit</h3></td>
    <td width="89" bgcolor="#FF7777"><h3>Aksi</h3></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_film_wo['id']; ?></td>
      <td><?php echo $row_film_wo['judul']; ?></td>
      <td><img src="upload/<?php echo $row_film_wo['gambar']; ?>" width="50" height="50" /></td>
      <td><?php echo $row_film_wo['tanggal']; ?></td>
      <td><a href="edit-upload.php?edit=<?php echo $row_film_wo['id']; ?>">Edit</a> | <a href="hapus-upload.php?id=<?php echo $row_film_wo['id']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_film_wo = mysql_fetch_assoc($film_wo)); ?>
</table>
    </div>
</div><div id="footer"></div>
<div id="footer1">
  <div align="center">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
</div>
</body>
</html>
<?php
mysql_free_result($film_wo);
?>
