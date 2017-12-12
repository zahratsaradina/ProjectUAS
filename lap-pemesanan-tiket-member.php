<?php
	require_once('Connections/conn_daftar.php');
	session_start();
  $id_embem=$_SESSION["id"];
  $namanya=$_SESSION["Ngaran"]; 
  
  mysql_select_db($database_conn_daftar, $conn_daftar);		
$sql = mysql_query("SELECT * FROM db_anggota where id_anggota='{$id_embem}' ", $conn_daftar);
    if(mysql_num_rows($sql) != 0){
        $data = mysql_fetch_assoc($sql);
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
<title>Laporan Pemesanan Tiket Member</title>
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
        <li class="button"><a href="loginsukses.php">Order</a></li>
        <li class="button"><a href="lap-pemesanan-tiket-member.php">Laporan Pemesanan</a></li>
      </ul>
    </div>
<div id="menu2"></div>
<div id="isi">
<p>

<hr />
<h1>Laporan Pemesanan Tiket <?php echo $data['nama_lengkap']; ?></h1>
<table width="944" border="1" align="center">
  <tr>
    <td width="152"><h3>Kode Pemesanan</h3></td>
    <td width="166"><h3>Tanggal Pesan</h3></td>
    <td width="198"><h3>Judul Film</h3></td>
    <td width="133"><h3>Jam</h3></td>
    <td width="110"><h3>Seat Baris</h3></td>
    <td width="145"><h3>Seat Kolom</h3></td>
  </tr>
  <?php $sql = mysql_query("SELECT * FROM pemesanan where 		id_anggota='{$id_embem}'  ORDER BY kd_pesan ASC", $conn_daftar);
  while($data_pesan = mysql_fetch_array($sql)){?>
  <tr>
    <td><?php echo $data_pesan['kd_pesan']; ?></td>
    <td><?php echo $data_pesan['tgl_pesan']; ?></td>
    <td><?php echo $data_pesan['judul']; ?></td>
    <td><?php echo $data_pesan['jam']; ?></td>
    <td><?php echo $data_pesan['seat_baris']; ?></td>
    <td><?php echo $data_pesan['seat_kolom']; ?></td>
  </tr>
  <?php }?>
</table>
    </div>
</div><div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
    	
</body>
</html>