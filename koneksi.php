<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kecamatan';

$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>