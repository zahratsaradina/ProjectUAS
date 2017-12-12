<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_daftar = "localhost";
$database_conn_daftar = "bioskop";
$username_conn_daftar = "root";
$password_conn_daftar = "";
$conn_daftar = mysql_pconnect($hostname_conn_daftar, $username_conn_daftar, $password_conn_daftar) or trigger_error(mysql_error(),E_USER_ERROR); 
?>