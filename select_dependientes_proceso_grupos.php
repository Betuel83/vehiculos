<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"tipo_vehiculo"=>"vehiculos_llanta_motor",
"descripcion_vehiculo"=>"vehiculos_llanta_motor",
);

session_start();
$_SESSION['opcionSeleccionada'] = $_POST['opcionSeleccionada'];
$autentificado = "SI";
$_POST['opcionSeleccionada'];

function validaSelect($selectDestino)
{
        // Se valida que el select enviado via GET exista
        global $listadoSelects;
        if(isset($listadoSelects[$selectDestino])) return true;
        else return false;
}

function validaOpcion($opcionSeleccionada)
{

        if($opcionSeleccionada) return true;
        else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
        $alumnos=$listadoSelects[$selectDestino];
        include("conexion.php");  //conexion al server
        
        $query_2_2="SELECT Id,CONCAT(no_llantas,' - ',no_motor) as descripcion_vehiculo 
                    FROM vehiculos_llanta_motor 
                    WHERE id_tipo_vehiculo	='$opcionSeleccionada' AND activo=1 ORDER BY Id";
        $result_2_2=mysqli_query($con,$query_2_2);
                    
        if(mysqli_num_rows($result_2_2)){
        }
                    
                    
        // Comienzo a imprimir el select
        echo "<select class='form-control' name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id);'>";
        echo "<option value='0'>Elige una descripcion...</option>";
        while ($row_2_2 = mysqli_fetch_array($result_2_2)){
                // Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
                $registro[1]=htmlentities($registro[1]);
                // Imprimo las opciones del select
                echo "<option value=".$row_2_2[0].">".$row_2_2[1]."</option>";
        }
        echo "</select>";
}

mysqli_free_result($result_2_2);
//fin de la extracion
?>