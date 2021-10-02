<?php
//creo la sesion
session_start();
$correo = $_SESSION['correo'];
$password = $_SESSION['password'];

include("valresultados.php");

if(mysqli_num_rows($result_1)){
echo"";
} else {
echo '<script type="text/javascript">window.location.href="index.php?Id=Su sesion ha caducado por falta de actividad en su cuenta, favor de volver a introducir su correo y su clave de acceso.";</script>';
die("");
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../inventario_vehiculos/js/jquery.functions.js" type="text/javascript"></script>
<script src="../inventario_vehiculos/js/buscar.js" type="text/javascript"></script>
</head>

<body>
<h2><font color="#361F17"><strong>Inventario General</strong></font></h2>

<div style="float: right;margin-right:20px;"><input type="text" id="kwd_search" value="" placeholder="Buscar..." style="width:100%;height:2em;"/></div>		
<div id="formulario" style="display:none;"></div>
<div id="tabla" style="height:500px;width:100%; overflow-x: auto;">
<?php include('../inventario_vehiculos/consulta.php') ?>
</div>
                         
</body>
</html>
