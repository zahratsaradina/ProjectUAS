<?php require_once('Connections/conn_daftar.php'); 

  session_start();
  $id_embem=$_SESSION["id"];
  $namanya=$_SESSION["Ngaran"];
  
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
	
$sql = mysql_query("SELECT * FROM db_anggota where id_anggota='{$id_embem}' ",$conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data = mysql_fetch_assoc($sql);
    }
	
	$sql = mysql_query("SELECT * FROM pemesanan where id_anggota='{$id_embem}' ORDER BY kd_pesan DESC ", $conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data_pesan = mysql_fetch_assoc($sql);
    }
	
/*
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conn_daftar, $conn_daftar);
$query_Recordset1 = "SELECT nama_lengkap, Username FROM db_anggota";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conn_daftar) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_pemesanan_fix = 10;
$pageNum_pemesanan_fix = 0;
if (isset($_GET['pageNum_pemesanan_fix'])) {
  $pageNum_pemesanan_fix = $_GET['pageNum_pemesanan_fix'];
}
$startRow_pemesanan_fix = $pageNum_pemesanan_fix * $maxRows_pemesanan_fix;

mysql_select_db($database_conn_daftar, $conn_daftar);
$query_pemesanan_fix = "SELECT * FROM pemesanan";
$query_limit_pemesanan_fix = sprintf("%s LIMIT %d, %d", $query_pemesanan_fix, $startRow_pemesanan_fix, $maxRows_pemesanan_fix);
$pemesanan_fix = mysql_query($query_limit_pemesanan_fix, $conn_daftar) or die(mysql_error());
$row_pemesanan_fix = mysql_fetch_assoc($pemesanan_fix);

if (isset($_GET['totalRows_pemesanan_fix'])) {
  $totalRows_pemesanan_fix = $_GET['totalRows_pemesanan_fix'];
} else {
  $all_pemesanan_fix = mysql_query($query_pemesanan_fix);
  $totalRows_pemesanan_fix = mysql_num_rows($all_pemesanan_fix);
}
$totalPages_pemesanan_fix = ceil($totalRows_pemesanan_fix/$maxRows_pemesanan_fix)-1;
*/


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
	<div id="bungkus_luar">
<div id="bgisi"><p>&nbsp;</p>
  <h2>&nbsp;</h2>
  <h2>Pemesanan Berhasil</h2>
  <table width="752" border="0">
    <tr>
      <td width="133">&nbsp;</td>
      <td width="159" height="37"><div align="left">Nama</div></td>
      <td width="10"><div align="left">:</div></td>
      <td width="432"><div align="left"><?php echo $data['nama_lengkap']; ?></div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td>&nbsp;</td>
        <td height="29"><div align="left">Username</div></td>
        <td><div align="left">:</div></td>
        <td><div align="left"><?php echo $data['Username']; ?></div></td>
      </tr>
      <!-- /*<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>*/ -->
  </table>
  <table width="751" border="0">
    <tr>
      <td width="134">&nbsp;</td>
      <td width="157" height="30"><div align="left">Kode pemesanan</div></td>
      <td width="11"><div align="left">:</div></td>
      <td width="431"><div align="left"><?php echo $data_pesan['kd_pesan']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="28"><div align="left">Pesan untuk tanggal</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['tgl_pesan']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="29"><div align="left">Judul</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['judul']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="28"><div align="left">Jam </div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['jam']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="28"><div align="left">Seat baris</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['seat_baris']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="31"><div align="left">Seat Kolom</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['seat_kolom']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right">
        <h3 align="left">&nbsp;</h3>
      </div></td>
    </tr>
    <?php do { ?>
      <!-- /*<?php } while ($row_pemesanan_fix = mysql_fetch_assoc($pemesanan_fix)); ?>*/-->
  </table>
  <a href="lap-pemesanan-tiket-member.php" class="btn btn-success" role="button">Simpan</a>
  <a href="loginsukses.php" class="btn btn-primary" role="button">Pesan Tiket Lagi</a>
  <blockquote>
    <p>&nbsp;</p>
  </blockquote>
</div>

</body>
</html>
<?php
/*mysql_free_result($Recordset1);

mysql_free_result($pemesanan_fix); */
?>
