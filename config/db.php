<?php
//start session
session_start();
 
 define('DB_HOST','localhost');
 define('USER_NAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','orders');
 define('SITE_URL','http://localhost/order/');
 $conn = mysqli_connect(DB_HOST,USER_NAME,'',DB_NAME) or die(mysqli_connect_error());
?>