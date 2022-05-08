<?php
include_once('include/Database.php');
include_once('include/paginator.class.php');

define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'crime' );
define( 'DB_PASSWORD', 'allow2cib@2022' );
define( 'DB_NAME', 'crime' );
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($link,$sSQL);

$dsn	= 	"mysql:dbname=".DB_NAME.";host=".DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
	$pdo->exec("SET CHARACTER SET UTF8");
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);
$pages	=	new Paginator();
error_reporting(E_ERROR | E_PARSE);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>