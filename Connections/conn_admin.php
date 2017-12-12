<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_admin = "localhost";
$database_conn_admin = "bioskop";
$username_conn_admin = "root";
$password_conn_admin = "";
$conn_admin = mysql_pconnect($hostname_conn_admin, $username_conn_admin, $password_conn_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>