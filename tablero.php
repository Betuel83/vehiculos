<?php
//creo la sesión
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

include("conexion.php");  //conexión al server
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autos Linares</title>
    <link href="vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom_tablero.css" rel="stylesheet">
	<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <script src="vendors/jquery/dist/jquery.js"></script>
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  </head>

  <body class="nav-md">
   <div class="jm-loadingpage"></div>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="">
            <div class="navbar nav_title" style="border: 0;">
              <a href="tablero.php" class="site_title"> <span>Autos Linares</span> AL</a>
            </div>

            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic">
                <img src="img/user.jpeg" width="90%" alt="..." class="img-circle">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo"$nombre_usuario_2_tablero"; ?></h2>
              </div>
            </div>

            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Men&uacute;</h3>
                <?php include("menu.php"); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <strong><?php echo"$nombre_usuario_2_tablero"; ?></strong>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="cerrarsesion.php" title="Cerrar Sesi&oacute;n"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesi&oacute;n</a></li>
                  </ul>
                </li>
                
                <li class="">
                  <a href="tablero.php" class="user-profile dropdown-toggle">
                    <strong><i class="fa fa-dashboard"></i> Tablero</strong>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3><font color="#361F17">Autos Linares,<small> la mejor opci&oacute;n en veh&iacute;culos.</small></font></h3>
                  </div>
                </div>
                
                <div id="capa">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color:black;">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Aviso!</h4>
                        Compra o vende tu auto usado o seminuevo, f&aacute;cil y comodamente, contamos con servicio de renta de veh&iacute;culos.
                    </div>
                
                <div class="row">
                </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
	
    <footer class="main-footer">
        <strong>&copy;<?php echo"$year"; ?> <a href="#">Autos Linares</a>.</strong> Todos los derechos reservados.
    </footer>

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendors/iCheck/icheck.min.js"></script>
    <script src="vendors/skycons/skycons.js"></script>
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="vendors/DateJS/build/date.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
	<script src="vendors/echarts/dist/echarts.min.js"></script>
    <script src="build/js/custom.min.js"></script>
    <!-- El gif se queda en la espera de que termine de cargar la página por completo, para finalizar su carga en pantalla -->
    <script>
    jQuery(window).load(function () {
     $(".jm-loadingpage").fadeOut("slow");
    });
    </script>
  </body>
</html>
