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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE film SET judul=%s, deskripsi=%s, gambar=%s WHERE id=%s",
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['deskripsi'], "text"),
                       GetSQLValueString($_FILES['gambar']['name'], "text"),
                       GetSQLValueString($_POST['id'], "int"));
					   move_uploaded_file($_FILES['gambar']['tmp_name'],"upload/".$_FILES['gambar']['name']);

  mysql_select_db($database_konek, $konek);
  $Result1 = mysql_query($updateSQL, $konek) or die(mysql_error());

  $updateGoTo = "list_film_wo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_editFilm = "-1";
if (isset($_GET['edit'])) {
  $colname_editFilm = $_GET['edit'];
}
mysql_select_db($database_konek, $konek);
$query_editFilm = sprintf("SELECT * FROM film WHERE id = %s", GetSQLValueString($colname_editFilm, "int"));
$editFilm = mysql_query($query_editFilm, $konek) or die(mysql_error());
$row_editFilm = mysql_fetch_assoc($editFilm);
$totalRows_editFilm = mysql_num_rows($editFilm);
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
<title>Edit Film</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/gaya.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="bg-abt">
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
     <div id="bg2-abt">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
<li class="button"></li>
        <li class="button"><a href="adminsukses.php">Home Admin</a></li>
    </div>
<div id="menu2"></div>
<div id="isi">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <table width="525" align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Judul:</td>
      <td><div align="left">
        <input type="text" name="judul" value="<?php echo htmlentities($row_editFilm['judul'], ENT_COMPAT, 'utf-8'); ?>" size="80" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Deskripsi:</td>
      <td><div align="left">
        <textarea name="deskripsi" cols="80" rows="5"><?php echo htmlentities($row_editFilm['deskripsi'], ENT_COMPAT, 'utf-8'); ?></textarea>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Gambar:</td>
      <td><div align="left">
        <input name="gambar" type="file" size="70" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input name="Submit" type="submit" value="Update" />
      <input name="Submit2" type="reset" value="Batal" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_editFilm['id']; ?>" />
</form>
    </div>
    <hr/>
</div><div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
</body>
</html>
<?php
mysql_free_result($editFilm);
?>
