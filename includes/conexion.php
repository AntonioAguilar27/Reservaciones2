<?php
// conexion 

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'reservapp';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db , "SET NAMES 'utf8'");

// inciar sesion 

if(!isset($_SESSION)){
    session_start();
}


?>