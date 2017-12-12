<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_login = "localhost";
$database_conn_login = "bioskop";
$username_conn_login = "root";
$password_conn_login = "";
$conn_login = mysql_pconnect($hostname_conn_login, $username_conn_login, $password_conn_login) or trigger_error(mysql_error(),E_USER_ERROR); 
?>