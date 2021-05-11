<?
// DB
$host = 'localhost';
$user = 'root';
$pass = '';
$port = '3306';
$db = 'rom';

$lvd = mysqli_connect($host, $user, $pass, $db, $port);

if(!$lvd){
	echo 'Error while connect DB';
	exit();
}