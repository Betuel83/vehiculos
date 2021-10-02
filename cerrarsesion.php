<?php
unset($correo);
unset($password);

$parametros_cookies = session_get_cookie_params();
setcookie(session_name(),0,1,$parametros_cookies["path"]);
$_SESSION = array();
HEADER("Location:index.php"); // regresa al inicio
?>