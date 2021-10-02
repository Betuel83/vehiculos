<?php
//creo la sesiÃ³n
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

include("conexion.php");  //conexi¨®n al server

if(isset($_POST['submit'])){
        require('../inventario_vehiculos/clases/cliente.class.php');

        $fecha_captura = htmlspecialchars(trim($_POST['fecha_captura']));
		$tipo_vehiculo = htmlspecialchars(trim($_POST['tipo_vehiculo']));
		$descripcion_vehiculo = htmlspecialchars(trim($_POST['descripcion_vehiculo']));
		$modelo = htmlspecialchars(trim($_POST['modelo']));
		$descripcion_general = htmlspecialchars(trim($_POST['descripcion_general']));

        $objCliente=new Cliente;
        if ( $objCliente->insertar(array($fecha_captura,$tipo_vehiculo,$descripcion_vehiculo,$modelo,$descripcion_general)) == true){
                echo 'Datos guardados';
        }else{
                echo 'Se produjo un error. Intente nuevamente';
        }
}else{
?>
<script type="text/javascript" src="../inventario_vehiculos/select_dependientes_grupos.js"></script>

<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="../inventario_vehiculos/nuevo.php" enctype="multipart/form-data" onsubmit="GrabarDatos(); return false;">

<strong><font color="#B18142">Agregar un nuevo veh&iacute;culo</font></strong><br><br>
  <font color="red">*</font> Fecha de Captura:<br />
  <input class="form-control" type="date" name="fecha_captura" id="fecha_captura" onclick="document.frmClienteNuevo.button.style.display='inline';" required="" autofocus/><br>

  <font color="red">*</font> Selecciona el tipo de veh&iacute;culo:<br />
  <select class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" onclick="document.frmClienteNuevo.button.style.display='inline';" onChange='cargaContenido(this.id)' required="">
  <option></option>
    <?
	  //extraigo los tipos de vehiculos
      $sql1="SELECT Id,tipo_vehiculo FROM vehiculos_tipo WHERE activo=1 ORDER BY Id";
      $res1=mysqli_query($con,$sql1);
      
      if ($res1) {
      while($row_1 = mysqli_fetch_array($res1)) {
      $dato_id=$row_1['Id'];  
      $dato_tipo=$row_1['tipo_vehiculo'];
      
      echo "<option value=".$dato_id.">".$dato_tipo."</option>";
      
      }
      mysqli_free_result($res1); //libero la consulta
      }
	?> </select><br>

    <font color="red">*</font> Selecciona el n&uacute;mero de llantas y motor:
    <div id="demoDer"><select class="form-control" disabled="disabled" name="descripcion_vehiculo" id="descripcion_vehiculo">
    <option>Selecciona opci&oacute;n...</option></select></div><br>
    
    <font color="red">*</font> Modelo:<br>
    <input class="form-control" type="text" name="modelo" id="modelo" onKeyDown="document.frmClienteNuevo.button.style.display='inline';" required=""/><br>
	
    <font color="red">*</font> Descripci&oacute;n del veh&iacute;culo:<br>
    <input class="form-control" type="text" name="descripcion_general" id="descripcion_general" onKeyDown="document.frmClienteNuevo.button.style.display='inline';" required=""/><br>
    
    <input class="btn btn-success" type="submit" name="submit" id="button" onclick="document.frmClienteNuevo.button.style.display='none';" value="Guardar"/>
    <input class="btn btn-primary" type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()"/>

</form>
<?php
}
?>