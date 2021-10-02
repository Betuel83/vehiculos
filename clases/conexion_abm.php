<?php
class DBManager{
        var $conect;
        var $BaseDatos;
        var $Servidor;
        var $Usuario;
        var $Clave;
        function __construct(){
                $this->BaseDatos = "smgsys6_smg";
                $this->Servidor = "localhost";
                $this->Usuario = "smgsys6_smg";
                $this->Clave = "";
        }

         function conectar() {
                if(!($con=@mysqli_connect($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos))){
                        echo"<h1> [:(] Error al conectar a la base de datos</h1>";
                        exit();
                }

                $this->conect=$con;
                return $con;
        }
}
?>
