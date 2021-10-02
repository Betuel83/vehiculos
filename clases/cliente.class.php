<?php
include_once("conexion_abm.php");

class Cliente{
 //constructor
         var $con;
         function __construct(){
                 $this->con=new DBManager;
         }

        function insertar($campos){
                if($this->con->conectar()==true){

				$campos[3]=utf8_decode($campos[3]);
				$campos[4]=utf8_decode($campos[4]);

                        return mysqli_query($this->con->conectar(), "INSERT INTO vehiculos_inventario (fecha_captura,tipo_vehiculo,descripcion_vehiculo,modelo,descripcion_general,activo) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','1')");
                }
        }

        function mostrar_vehiculos(){
                if($this->con->conectar()==true){
                        return mysqli_query($this->con->conectar(), "SELECT vehiculos_inventario.Id,vehiculos_inventario.fecha_captura,
                                                                     vehiculos_tipo.tipo_vehiculo,
                                                                     CONCAT(vehiculos_llanta_motor.no_llantas,' ',vehiculos_llanta_motor.no_motor) AS descripcion_vehiculo,
                                                                     vehiculos_inventario.modelo,
                                                                     vehiculos_inventario.descripcion_general,
                                                                     vehiculos_inventario.activo
                                                                     FROM vehiculos_inventario,vehiculos_tipo,vehiculos_llanta_motor
                                                                     WHERE vehiculos_inventario.tipo_vehiculo=vehiculos_tipo.Id AND
                                                                     vehiculos_inventario.descripcion_vehiculo=vehiculos_llanta_motor.Id
                                                                     ORDER BY vehiculos_inventario.fecha_captura DESC");
                }
        }

        function eliminar($id){
                if($this->con->conectar()==true){
                        return mysqli_query($this->con->conectar(), "UPDATE vehiculos_inventario SET activo=0 WHERE Id=".$id);
                }
        }

        function activar($id){
                if($this->con->conectar()==true){
                        return mysqli_query($this->con->conectar(), "UPDATE vehiculos_inventario SET activo=1 WHERE Id=".$id);
                }
        }
}

?>