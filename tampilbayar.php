
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Opsi Pembayaran</title>
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
        <li class="button"><a href="loginsukses.php">Order</a></li>
        <li class="button"><a href="lap-pemesanan-tiket-member.php">Laporan Pemesanan</a></li>
        <li class="button"><a href="<?php echo $logoutAction ?>">Logout</a></li>
      </ul>
    </div>
<div id="menu2"></div>
<div id="isi-loginsukses">
<br>

<div class="container" align="Left">
  <h2>Opsi Pembayaran</h2>
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
      <li><a href="infobca.php">BCA</a></li>
    </ul>
  </div>
</div>
</div>
</div>
<div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
    </div>
    	
</body>
</html>
