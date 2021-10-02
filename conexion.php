<?php 
$con = mysqli_connect('localhost', 'smgsys6_smg', ')MR8r[+60dY]', 'smgsys6_smg'); 
if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . mysqli_connect_error() . ") " . mysqli_connect_error();
    exit();
}
mysqli_set_charset($con, "utf8");


//extraigo el nombre del usuario que incio sesión
$query_2_tablero_index="SELECT empleados.nombre
                        FROM empleados,usuarios
                        WHERE empleados.Id=usuarios.cve_persona AND usuarios.correo='$correo'";
$result_2_tablero_index=mysqli_query($con,$query_2_tablero_index);

if(mysqli_num_rows($result_2_tablero_index)){
}

if ($row_2_tablero_index = mysqli_fetch_array($result_2_tablero_index)){
$nombre_usuario_2_tablero=$row_2_tablero_index["nombre"];
}

mysqli_free_result($result_2_tablero_index);
//fin de la extración


$year=date("Y");
?> 