<ul class="nav side-menu">
<li><a><i class="fa fa-edit"></i> Captura <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a>Inventario<span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">

<script type="text/javascript">
$(document).ready(function() {
$("#alta_vehiculos").click(function(event){
$("#alta_vehiculos").html("Procesando...");
$('#alta_vehiculos').attr('id', 'noclick');
$("#capa").load('vehiculos.php', function(){ 
$('#noclick').attr('id', 'alta_vehiculos');
$("#alta_vehiculos").html("Alta de Veh&iacute;culos");	
} );

});
});
</script>

<li>
<a href="#" id="alta_vehiculos" title="Capturar datos de los veh&iacute;culos">Alta de Veh&iacute;culos</a>
</li>
</li>
</ul>
</li>
</ul>
</li>
</ul>