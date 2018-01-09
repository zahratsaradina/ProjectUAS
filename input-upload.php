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
  $insertSQL = sprintf("INSERT INTO film (judul, deskripsi, gambar) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['deskripsi'], "text"),
                       GetSQLValueString($_FILES['gambar']['name'], "text"));
					   move_uploaded_file(
$_FILES['gambar']['tmp_name'],"upload/".$_FILES['gambar']['name']);

  mysql_select_db($database_konek, $konek);
  $Result1 = mysql_query($insertSQL, $konek) or die(mysql_error());

  $insertGoTo = "list_film_wo.php";
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
<div id="bg-rilisupload">
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
     <div id="bg2rilisupload">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
<li class="button"></li>
        <li class="button"><a href="adminsukses.php">Home Admin</a></li>
    </div>
<div id="menu2"></div>
<div id="isi">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data" >
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td width="60" align="right" nowrap="nowrap">Judul:</td>
      <td width="514"><div align="left">
        <input type="text" name="judul" value="" size="80" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Deskripsi:</td>
      <td><div align="left">
        <textarea name="deskripsi" cols="80" rows="5"></textarea>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><div align="left">
        <input name="gambar" type="file" size="32" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><div align="left">
        <input type="submit" value="Tambah" />
        <input name="Reset" type="reset" value="Batal" />
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
<div id="footer"></div>
    <div class="panel-footer">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
    </div>
</body>
</html>