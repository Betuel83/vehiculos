<?php
//creo la sesión
session_start();
$correo = $_SESSION['correo'];
$password = $_SESSION['password'];

include("valresultados.php");

if(mysqli_num_rows($result_1)){
echo"";
} else {
echo '<script type="text/javascript">window.location.href="index.php?Id=Su sesion ha caducado por falta de actividad en su cuenta, favor de volver a introducir su correo y su clave de acceso";</script>';
die("");
}

require('../inventario_vehiculos/clases/cliente.class.php');

$cliente_id=$_GET['Id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($cliente_id) == true){
        echo "Vehiculo desactivado cerradtamente";
}else{
        echo "Ocurrio un error";
}
?>