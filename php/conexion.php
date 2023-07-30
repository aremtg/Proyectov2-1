<?php 

$servidor= 'localhost';
$usuario = 'root';
$pass = "";
$nameDB = 'controlIngreso';

$db = mysqli_connect($servidor,$usuario,$pass,$nameDB);

if(!isset($_SESSION)){
    session_start();
} 
?>