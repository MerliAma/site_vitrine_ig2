<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cnx_procedurale = "mysql.hostinger.com";
$database_cnx_procedurale = "u889117375_itg";
$username_cnx_procedurale = "u889117375_forty";
$password_cnx_procedurale = "PW4itg@forty";
$cnx_procedurale = @mysql_pconnect($hostname_cnx_procedurale, $username_cnx_procedurale, $password_cnx_procedurale) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
