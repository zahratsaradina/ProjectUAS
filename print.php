<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Pemesanan</title>
  <h2 align="center">Pemesanan Berhasil</h2>
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
</body>
</html>
<?php
/*mysql_free_result($Recordset1);

mysql_free_result($pemesanan_fix); */
?>

<?php $html = ob_get_contents();
ob_end_clean();     
require_once('bioskop/html2pdf.class.php');$pdf = new HTML2PDF('P','A4','en');$pdf->WriteHTML($html);$pdf->Output('cetak-tiket.pdf', 'D');
?>