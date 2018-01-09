<?php require_once('Connections/conn_daftar.php'); ?>.

<?php
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

$sql = mysql_query("SELECT * FROM db_anggota where id_anggota='{$id_embem}' ", $conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data = mysql_fetch_assoc($sql);
    }
	
	$sql = mysql_query("SELECT * FROM pemesanan where id_anggota='{$id_embem}'  ORDER BY kd_pesan DESC", $conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data_pesan = mysql_fetch_assoc($sql);
    }
/*
$maxRows_tampilpesanan = 10;
$pageNum_tampilpesanan = 0;
if (isset($_GET['pageNum_tampilpesanan'])) {
  $pageNum_tampilpesanan = $_GET['pageNum_tampilpesanan'];
}
$startRow_tampilpesanan = $pageNum_tampilpesanan * $maxRows_tampilpesanan;

mysql_select_db($database_conn_daftar, $conn_daftar);
$query_tampilpesanan = "SELECT * FROM pemesanan";
$query_limit_tampilpesanan = sprintf("%s LIMIT %d, %d", $query_tampilpesanan, $startRow_tampilpesanan, $maxRows_tampilpesanan);
$tampilpesanan = mysql_query($query_limit_tampilpesanan, $conn_daftar) or die(mysql_error());
$row_tampilpesanan = mysql_fetch_assoc($tampilpesanan);

if (isset($_GET['totalRows_tampilpesanan'])) {
  $totalRows_tampilpesanan = $_GET['totalRows_tampilpesanan'];
} else {
  $all_tampilpesanan = mysql_query($query_tampilpesanan);
  $totalRows_tampilpesanan = mysql_num_rows($all_tampilpesanan);
}
$totalPages_tampilpesanan = ceil($totalRows_tampilpesanan/$maxRows_tampilpesanan)-1;

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conn_daftar, $conn_daftar);
$query_Recordset1 = "SELECT nama_lengkap, Username, email, no_hp, alamat FROM db_anggota";
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
<title>Pesan TIket | ZORRO CINEMA</title>
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
     <div id="bg2-sukses">
    <div id="menu">
      <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"></li>
        <li class="button"><a href="#">Order</a></li>
        <li class="button"><a href="lap-pemesanan-tiket-member.php">Laporan Pemesanan</a></li>
        <li class="button"><a href="<?php echo $logoutAction ?>">Logout</a></li>
      </ul>
    </div>
<div id="menu2"></div>
<div id="isi">
  <p>&nbsp;</p>
  <frame>
  <table border="0">
    <tr>
      <td><h2>&nbsp;</h2></td>
      <td>&nbsp;</td>
      <td colspan="3"><h2 align="left">Data Diri Pemesan</h2></td>
    </tr>
    <tr>
      <td width="130">&nbsp;</td>
      <td width="74">&nbsp;</td>
      <td width="189"><div align="left">Nama Lengkap</div></td>
      <td width="18"><div align="left">:</div></td>
      <td width="372"><div align="left"><?php echo $data['nama_lengkap']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="left">Username</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data['Username']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="left">Email</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data['email']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="left">No HP / Telepon</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data['no_hp']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="left">Alamat</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data['alamat']; ?></div></td>
    </tr>

  </table>
  <blockquote>
    <p>&nbsp;</p>
  </blockquote>
  <table width="804" border="0">
    <tr>
      <td><h2 align="left">&nbsp;</h2></td>
      <td colspan="3"><h2 align="left">Judul Film</h2></td>
    </tr>
    <tr>
      <td width="208">&nbsp;</td>
      <td width="190"><div align="left">Kode pemesanan</div></td>
      <td width="18"><div align="left">:</div></td>
      <td width="370"><div align="left"><?php echo $data_pesan['kd_pesan']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">Pesan untuk tanggal</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['tgl_pesan']; ?></div></td>
    </tr>
    <!--<tr>
      <td>&nbsp;</td>
      <td><div align="left">Hari</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['hari']; ?></div></td>
    </tr>-->
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">Judul film</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['judul']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">Jam tayang</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['jam']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">Seat baris</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['seat_baris']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">Seat kolom</div></td>
      <td><div align="left">:</div></td>
      <td><div align="left"><?php echo $data_pesan['seat_kolom']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><h3 align="center"><a href="cetak-tiket.php" class="btn btn-success" role="button">Cetak Tiket</a></h3></td>
      <td>&nbsp;</td>
    </tr>
    <frame />

    <!-- /*<?php do { ?>
      <?php } while ($row_tampilpesanan = mysql_fetch_assoc($tampilpesanan)); ?> */
  -->  </table>
</div>



    

</div>
    <div class="container" align="Left">
  <h2><strong>Opsi Pembayaran</strong></h2>
  <div class="alert alert-info">
  <p>Pembayaran hanya bisa dilakukan melalui e-banking</p>
  <p>Silakan pilih bank yang sudah tertera</p>
  <p>Jika dalam kurun waktu 60 menit anda belum melakukan transfer, maka reservasi tiket dianggap gagal.</p>                   
</div>                       
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opsi Pembayaran
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="vertical-align: center">
      <li><a href="infobri.php">BRI</a></li>
      <li><a href="infobri.php">BCA</a></li>
    </ul>
  </div>
</div>
</div>

    	 <div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div></div>
</body>
</html>
<?php
/*mysql_free_result($tampilpesanan);

mysql_free_result($Recordset1);
*/
?>
