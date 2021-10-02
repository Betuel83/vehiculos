<?php
include("conexion.php");  //conexion al server

//creo la sesion
session_start();
$correo = $_SESSION['correo'];
$password = $_SESSION['password'];

//consulta
$ssql = "SELECT correo,password FROM usuarios WHERE correo='$correo' AND password='$password' AND activo=1";
$result_1=mysqli_query($con,$ssql);

mysqli_close($con); //cierro la conexion al server
?>