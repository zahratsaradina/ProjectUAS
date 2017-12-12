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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO rilis_film (id_film, bulan_rilis, judul_film, desc_film, img_film, tgl_edit) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_film'], "int"),
                       GetSQLValueString($_POST['bulan_rilis'], "text"),
                       GetSQLValueString($_POST['judul_film'], "text"),
                       GetSQLValueString($_POST['desc_film'], "text"),
                       GetSQLValueString($_FILES['img_film']['name'], "text"),
                       GetSQLValueString($_POST['tgl_edit'], "date"));
					   move_uploaded_file($_FILES['img_film']['tmp_name'],"upload/".$_FILES['img_film']['name']);

  mysql_select_db($database_konek, $konek);
  $Result1 = mysql_query($insertSQL, $konek) or die(mysql_error());

  $insertGoTo = "rilis_list_film.php";
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
<title>Tambah Film</title>
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
<li class="button"></li>
        <li class="button"><a href="adminsukses.php">Home Admin</a></li>
    </div>
<div id="menu2"></div>
<div id="isi">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <table width="667" align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bulan di Rilis:</td>
      <td><div align="left">
        <input type="text" name="bulan_rilis" value="" size="80" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Judul:</td>
      <td><div align="left">
        <input type="text" name="judul_film" value="" size="80" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Deskripsi:</td>
      <td><div align="left">
        <textarea name="desc_film" cols="80" rows="5"></textarea>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><div align="left">
        <input name="img_film" type="file" size="80" />
      </div></td>
    </tr>
    <tr valign="baseline">
      
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><div align="left">
        <input type="submit" value="Tambah" />
        <input name="Reset" type="reset" value="Batal" />
      </div></td>
    </tr>
  </table>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  <p align="center"><a href="release.php">List Film </a></p>
</form>
    </div>
</div><div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
</body>
</html>