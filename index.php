<?php
$year=date("Y");
?>
<!DOCTYPE html>
<html lang="es">
<!-- 

//============================================================+
// Autor: Jesús Betuel Garza Sendejo
// Correo: jesus.betuel@gmail.com
//============================================================+

-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" title="Inventario de Vehiculos">
    <title>Autos Linares</title>
    <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="build/css/custom_index.css" rel="stylesheet">
  </head>

  <body class="login">
      <div class="login_wrapper">
        <div class="">
		  <section class="login_content">
            <form name="formulario" method="post" action="validacion.php">
              <h1>Bienvenidos</h1>
              <div class="form-group has-feedback">
                <input type="email" name="correo" class="form-control" placeholder="Email" required="" autofocus/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div>
			    <input class="btn btn-default submit" type="submit" name="Iniciar" value="Iniciar Sesi&oacute;n" style="background:gray;color:white;">
                <a class="reset_pass" href="#"><font color="#EDEDED">&#191;Olvidaste tu contrese&ntilde;a?</font></a>
              </div>
			  <div>

                <div class="clearfix"></div>
                <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h2>Autos Linares</h2>
                  <p>©<?php echo"$year"; ?> Todos los derechos reservados.</p>
                  <br>
				  <?php 
				  $Id_recuperar=$_GET['Id'];
				  echo"<font size=3px>$Id_recuperar</font>"; 
				  ?>
				</div>
              </div>
            </form>
          </section>
        </div>		
      </div>
    </div>
  </body>
</html>