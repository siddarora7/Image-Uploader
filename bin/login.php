<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "rkpuram123";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$conn) 
{
	die("Connection Failed: ");
}

$cr_db = "CREATE DATABASE photos";
if (mysqli_query($conn,$cr_db)) 
{
	echo "Database created";
}

mysqli_select_db($conn, "photos");


//To create table called "images" 
$tbl = "images";

$s_q = "CREATE TABLE images ( 
id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
image LONGBLOB,
text TEXT)";

mysqli_query($conn, $s_q);
mysqli_close($conn);
?>
