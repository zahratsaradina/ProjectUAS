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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome Admin!</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/gayaaaaaa.css" rel="stylesheet" type="text/css" />

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
      
    <div id="menu2"></div>

    <div id="uptengah"></div>
    <div id="isi">
      <table width="1215" border="0">
        <tr>
          <td width="729"><hr />           
          <div align="center"><img src="images/src img/adm.png" width="111" height="134" align="absmiddle" /></div></td>
        </tr>
        <tr>
          <td height="40"><h1 align="center">Selamat Datang Admin</h1></td>
        </tr>
     </table>
        <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="list_film_wo.php">Edit What's On</a></li></ul>
        <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="rilis_input_upload.php">Edit Releases</a></li></ul>
        <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="lap-pemesanan-admin.php">Laporan Pemesanan</a></li></ul>
        <ul class="Red" id="menu_wrap" name="menu_wrap">
        <li class="button"><a href="<?php echo $logoutAction ?>">Logout</a></li></ul>
        
       
    </div>
    <p align="left">&nbsp;</p>
   		    <p align="left">&nbsp;</p></td>
  		</tr>
      
	</table>
    
	<p>&nbsp;</p>
</div>
	</div>
    	<div id="footer"></div>
    <div id="footer1" align="center">Copyright © 2017 Zorro Cinema - All Rights Reserved</div>
</div>
 </div>
</body>
</html>