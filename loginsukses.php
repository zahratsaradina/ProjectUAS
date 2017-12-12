<?php
  session_start();
 
  $namanya=$_SESSION["Ngaran"];
  $id_embem=$_SESSION["id"];
?><?php require_once('Connections/conn_daftar.php'); ?>
 <link rel="stylesheet" href="jquery/jquery-ui.css" type="text/css"/>
  <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="jquery/jquery-ui.js" type="text/javascript"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
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
<?php require_once('Connections/conn_login.php'); ?>
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

/*if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pemesanan (kd_pesan, hari, judul, jam, seat_baris, seat_kolom) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['kd_pesan'], "int"),
                       GetSQLValueString($_POST['hari'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['jam'], "text"),
                       GetSQLValueString($_POST['seat_baris'], "text"),
                       GetSQLValueString($_POST['seat_kolom'], "text"));


  mysql_select_db($database_conn_daftar, $conn_daftar);
  $Result1 = mysql_query($insertSQL, $conn_daftar) or die(mysql_error());

  $insertGoTo = "tampil-pemesanan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}*/

 /*if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO pemesanan (kd_pesan, tgl_pesan, judul, jam, seat_baris, seat_kolom) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['kd_pesan'], "int"),
                       GetSQLValueString($_POST['tgl_pesan'], "date"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['jam'], "text"),
                       GetSQLValueString($_POST['seat_baris'], "text"),
                       GetSQLValueString($_POST['seat_kolom'], "text"));
				   
	
  mysql_select_db($database_conn_daftar, $conn_daftar);
  $Result1 = mysql_query($insertSQL, $conn_daftar) or die(mysql_error());

  $insertGoTo = "tampil-pemesanan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}*/	

if(isset($_POST['MM_insert']) && ($_POST["MM_insert"] == "form2")){
        $kode = $_POST['kd_pesan'];
		$id = $_POST['kd_pesan'];
        $tgl = $_POST['tgl_pesan'];
        $judul = $_POST['judul'];
		$jam = $_POST['jam'];
		$baris = $_POST['seat_baris'];
		$kolom = $_POST['seat_kolom'];
        $query = "INSERT pemesanan (kd_pesan, id_anggota, nama_lengkap, tgl_pesan, judul, jam, seat_baris, seat_kolom)
		VALUES (
        '{$kode}', '{$id_embem}', '{$namanya}', '{$tgl}', '{$judul}', '{$jam}', '{$baris}', '{$kolom}'
    )";
        if(mysql_query($query,$conn_daftar)){
            //Sucess
            header("Location: tampil-pemesanan.php");
        } else{
            echo "<p>something is wrong</p>";
            echo "<p>" . mysql_error() . "</p>";
        }


    }

mysql_select_db($database_conn_login, $conn_login);
$query_Recordset1 = "SELECT * FROM db_anggota";
$Recordset1 = mysql_query($query_Recordset1, $conn_login) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
<div id="bg-sukses">
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
<div id="isi-loginsukses">
  <h2>Selamat datang <?php echo $namanya; ?></h2>
  <h2>Silahkan mengisi form berikut untuk pesan tiket</h2>
  <p><img src="images/seat.png" width="591" height="422" /></p>
  <p>&nbsp;</p>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  </form>
 <?php  
 date_default_timezone_set("Asia/Jakarta");  

 ?>  

 <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <table width="511" align="center">
      <tr valign="baseline">
        <td width="133" align="right" nowrap="nowrap"><div align="left">Pesan untuk tanggal </div></td>
        <td width="19" align="right" nowrap="nowrap"><div align="left">:</div></td>
        <td width="343"><p align="left">
		
          <input required type="date" name="tgl_pesan" id="embem"  size="55" />
		  
		 

          </p></td>
      </tr>
      <!--
	  <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Hari </div></td>
        <td nowrap="nowrap" align="right"><div align="left">:</div></td>
        <td><div align="left">
		  <input type="text" name="tgl_pesan" disabled value="<?php echo date('l'); ?>" size="55" />
         
        </div></td>
      </tr>
	  -->
	  
	  
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Judul Film </div></td>
        <td nowrap="nowrap" align="right"><div align="left">:</div></td>
        <td><div align="left">
       	  <select required name="judul">
    <option value="">---- Pilih Judul Film ----</option>
    <?php
   
    $sql = mysql_query("SELECT * FROM film ORDER BY id ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option>'.$data['judul'].'</option>';
        }
    }
    ?>
</select>



        </div></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Jam Tayang </div></td>
        <td nowrap="nowrap" align="right"><div align="left">:</div></td>
        <td><p align="left">
          <input type="radio" name="jam" value="12.00 WIB" size="55" />
        12.00 WIB |
          <input type="radio" name="jam" value="14.00 WIB" size="55" />
        14.00 WIB |
        <input type="radio" name="jam" value="16.00 WIB" size="55" />
        16.00 WIB | <p align="left">
        <input type="radio" name="jam" value="18.00 WIB" size="55" />
        18.00 WIB |
        <input type="radio" name="jam" value="20.00 WIB" size="55" />
        20.00 WIB |
        </p></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Seat baris </div></td>
        <td nowrap="nowrap" align="right"><div align="left">:</div></td>
        <td><p align="left">
          <select name="seat_baris">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
            <option value="I">I</option>
            <option value="J">J</option>
            <option value="K">K</option>
            <option value="L">L</option>
            >
          </select>
        </p></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left">Seat kolom </div></td>
        <td nowrap="nowrap" align="right"><div align="left">:</div></td>
        <td><p align="left">
          <select name="seat_kolom">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
</select>
        </p></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td nowrap="nowrap" align="right"><div align="left"></div></td>
        <td><input type="submit" value="Lihat Pemesanan" />          <input type="reset" name="btnBatal" id="btnBatal" value="Batal" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2" />
  </form>
</td>
  		</tr>
	</table>

</div><div id="footer"></div>
<div id="footer1">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
    </div>
    	
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
