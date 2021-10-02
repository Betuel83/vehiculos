<?
include("conexion.php");  //conexión al server

$correo = $_POST['correo'];
$password = $_POST['password'];

//prevenir inyección SQL
function make_safe1($correo) {
$correo = addslashes(trim($correo));
return $correo;
}

function make_safe2($password) {
$password = addslashes(trim($password));
return $password;
}

$password=md5($password);

//validamos que el usuario este activo para proceder con el logeo
$consulta_1="SELECT activo
             FROM usuarios
             WHERE correo='$correo' AND password='$password'";
$result_1 = mysqli_query($con,$consulta_1);

if ($result_1) {
if($row_1 = mysqli_fetch_array($result_1)) {
$activo_2=$row_1['activo'];
}

mysqli_free_result($result_1); //libero la consulta
}
//fin


//primer if
if(!empty($activo_2)){

//segundo if
if($activo_2==1){
   echo"";
}else{
   echo '<script type="text/javascript">window.location.href="login.php?Id=Su cuenta ha sido desactivada, en caso de requerir el uso de la cuenta, comunicarse a Gerencia";</script>';
   die("");
}//fin del segundo if

}//fin del primer if


//Sentencia SQL para buscar un usuario con esos datos
$ssql = "SELECT correo,password FROM usuarios WHERE correo='$correo' AND password='$password' AND activo=1";
$rs = mysqli_query($con,$ssql);
if (mysqli_num_rows($rs)!=0){
if ($row_3 = mysqli_fetch_array($rs)){
}	
    session_start();
    $_SESSION['correo'] = $_POST['correo'];
    $_SESSION['password'] = md5($_POST['password']);
    $autentificado = "SI";
    $_POST['correo'];
    md5($_POST['password']);
	
    echo '<script type="text/javascript">window.location.href="tablero.php";</script>';
    }else{
    echo '<script type="text/javascript">window.location.href="index.php?Id=Su correo o clave de acceso son incorrectos, favor de introducir sus datos validos.";</script>';
    die("");
    }

mysqli_free_result($rs);
mysqli_close($con);
?>