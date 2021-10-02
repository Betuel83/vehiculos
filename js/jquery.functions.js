        function ActualizarDatos(){


                var Id = j('#Id').attr('value');
                var fecha_captura = j('#fecha_captura').attr('value');
			    var tipo_vehiculo = j('#tipo_vehiculo').attr('value');
			    var descripcion_vehiculo = j('#descripcion_vehiculo').attr('value');
			    var modelo = j('#modelo').attr('value');
			    var descripcion_general = j('#descripcion_general').attr('value');

                j.ajax({
                        url: '../inventario_vehiculos/actualizar.php',
                        type: "POST",
                        data: "submit=&fecha_captura="+fecha_captura+"&tipo_vehiculo="+tipo_vehiculo+"&descripcion_vehiculo="+descripcion_vehiculo+"&modelo="+modelo+"&descripcion_general="+descripcion_general+"&Id="+Id,
                        success: function(datos){
                                alert(datos);
                                ConsultaDatos();
                                j("#formulario").hide();
                                j("#tabla").show();
                        }
                });
                return false;
        }

        function ConsultaDatos(){
                j.ajax({
                        url: '../inventario_vehiculos/consulta.php',
                        cache: false,
                        type: "GET",
                        success: function(datos){
                                j("#tabla").html(datos);
                        }
                });
        }

        function EliminarDato(Id){
                var msg = confirm("Desea desactivar este vehiculo?")
                if ( msg ) {
                        j.ajax({
                                url: '../inventario_vehiculos/eliminar.php',
                                type: "GET",
                                data: "Id="+Id,
                                success: function(datos){
                                        ConsultaDatos();
                                        alert(datos);
                                }
                        });
                }
                return false;
        }


        function ActivarDato(Id){
                var msg = confirm("Desea activar este vehiculo?")
                if ( msg ) {
                        j.ajax({
                                url: '../inventario_vehiculos/activar.php',
                                type: "GET",
                                data: "Id="+Id,
                                success: function(datos){
                                	    ConsultaDatos();
                                        alert(datos);
                                }
                        });
                }
                return false;
        }

        function GrabarDatos(){

                var fecha_captura = j('#fecha_captura').attr('value');
			    var tipo_vehiculo = j('#tipo_vehiculo').attr('value');
			    var descripcion_vehiculo = j('#descripcion_vehiculo').attr('value');
			    var modelo = j('#modelo').attr('value');
			    var descripcion_general = j('#descripcion_general').attr('value');

                j.ajax({
                        url: '../inventario_vehiculos/nuevo.php',
                        type: "POST",
                        data: "submit=&fecha_captura="+fecha_captura+"&tipo_vehiculo="+tipo_vehiculo+"&descripcion_vehiculo="+descripcion_vehiculo+"&modelo="+modelo+"&descripcion_general="+descripcion_general,
                        success: function(datos){
                                ConsultaDatos();
                                alert(datos);
                                j("#formulario").hide();
                                j("#tabla").show();
                        }
                });
                return false;
        }

        function Cancelar(){
                j("#formulario").hide();
                j("#tabla").show();
                return false;
        }