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
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_vehiculos();
?>

<script type="text/javascript">
$(document).ready(function(){
        // llamar a formulario nuevo
        $("#nuevo a").click(function(){
                $("#formulario").show();
                $("#tabla").hide();
                $.ajax({
                        type: "GET",
                        url: '../inventario_vehiculos/nuevo.php',
                        success: function(datos){
                                $("#formulario").html(datos);
                        }
                });
                return false;
        });
});
</script>

        <span id="nuevo"><a href="../inventario_vehiculos/nuevo.php"><img src="../inventario_vehiculos/img/add.png" title="Agregar nuevo vehiculo" width="20px" height="20px"/></a></span>
        <table id="my-table" class="sortable" style="width:100%;background:white;border: black 1px solid;">
		<thead>
        <tr align="center" style="background:gray;color:white;font-size:10px;position:sticky;top:0;">
        <td>No</td>
        <td>Fecha de captura</td>
		<td>Tipo</td>
		<td>Descripci&oacute;n</td>
        <td>Modelo</td>
        <td>Caracteristicas</td>
        <td>Estatus</td>
        <td>Desactivar</td>
        </tr>
		</thead>
		<tbody>
<?php
if($consulta) {
    $i=1;
        while( $cliente = mysqli_fetch_array($consulta) ){
            if($cliente['activo']==1){
                $estatus="Activo";
            }else{
                $estatus="Desactivado";
            }
?>
                    <tr align="center" style="font-size:10px;" id="fila-<?php echo $cliente['Id'] ?>">
                    <th style="border: #B18142 1px solid;"><center><?php echo $i; ?></center></th>
                    <th style="border: #B18142 1px solid;"><center><?php echo $cliente['fecha_captura'] ?></center></th>
                    <th style="border: #B18142 1px solid;"><center><?php echo $cliente['tipo_vehiculo'] ?></center></th>
				    <th style="border: #B18142 1px solid;"><center><?php echo $cliente['descripcion_vehiculo'] ?></center></th>
					<th style="border: #B18142 1px solid;"><center><?php echo utf8_encode($cliente['modelo']); ?></center></th>
                    <th style="border: #B18142 1px solid;"><center><?php echo utf8_encode($cliente['descripcion_general']); ?></center></th>
                    <th style="border: #B18142 1px solid;"><center><?php echo $estatus; ?></center></th>
                    <?php
                        if($cliente['activo']==1){
                    ?>
                          
                    <th style="border: #B18142 1px solid;"><span class="dele"><a onClick="EliminarDato(<?php echo $cliente['Id'] ?>); return false" href="../inventario_vehiculos/eliminar.php?Id=<?php echo $cliente['Id'] ?>"><center><img src="../inventario_vehiculos/img/delete.png" title="Desactivar vehiculo" alt="Eliminar" width="20px" height="20px" /></center></a></span></th>
                         
                    <?php
                        }else{
                    ?>
                          
                    <th style="border: #B18142 1px solid;"><span class="dele"><a onClick="ActivarDato(<?php echo $cliente['Id'] ?>); return false" href="../inventario_vehiculos/activar.php?Id=<?php echo $cliente['Id'] ?>"><center><img src="../inventario_vehiculos/img/aspa.png" title="Activar vehiculo" alt="Activar" width="20px" height="20px" /></center></a></span></th>
                          
                    <?php
                        }
                    ?>
                    </tr>
<?php
    $i++;
    }
}
?>
</tbody>
</table>